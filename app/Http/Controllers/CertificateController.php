<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Csvdata;
use Illuminate\Http\Request;
use App\Mail\certificateMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File as FacadesFile;

class CertificateController extends Controller
{
    public function validateArrayData($data)
    {
        foreach ($data as $key => $values) {
            foreach ($values as $value) {
                if (is_null($value) || $value == '') {
                    unset($data[$key]);
                }
            }
        }
        return $data;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'csvfile' => ['required'],
        ]);
        if ($request->hasfile('csvfile')) {
            $csv = file_get_contents($request->csvfile);
            $array = array_map('str_getcsv', explode(PHP_EOL, $csv));

            $validate = $this->validateArrayData($array);
            // dd($validate[0][1]);
            // $json = json_encode($validate);

            // $csvfile = json_decode($json, true);

            foreach (array_slice($validate, 1) as $key => $values) {
                $data = new Csvdata();
                //  dd($values);
                $data->user_id = Auth::user()->id;
                $data->student_name = $values[0];
                $data->purpose = $values[1];
                $data->course = $values[2];
                $data->email = $values[3];
                $data->director_name = $values[4];
                $data->save();
            }

            $fetchdata = Csvdata::where('user_id', Auth::user()->id)->get();
            foreach ($fetchdata as $fetch) {
                if ($fetch->status == 0) {
                    $mailCertificate = [
                        'name' => $fetch->student_name,
                        'reason' => $fetch->purpose,
                        'course' => $fetch->course,
                        'directorname' => $fetch->director_name,
                    ];
                    $send = Mail::to($fetch->email)->send(new certificateMail($mailCertificate));
                    if ($send) {
                        $fetch->update([
                            'status' => 1,
                        ]);
                        // return response()->json([
                        //     'status' => true,
                        //     'message' => 'You have Successfully Generated Certificate for the students and we have sent the email containing their certifciate!!',
                        // ]);
                        // return redirect()->back()->with('status', 'You have Successfully Generated Certificate for the students and we have sent them a mail containing their certificate!!');
                    }

                }
            }
         return redirect()->back()->with('status', 'You have Successfully Generated Certificate for the students and we have sent them a mail containing their certificate!!');
        } else {
            dd("no");
        }

        // dd($uploadcsv);

    }

    public function editlogoandsign()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.logoandsignature', compact('user'));
    }


    public function updatelogo(Request $request)
    {
        // if(Auth::check()){
            $updatelogo = User::find(Auth::user()->id);
            // $update->status = $request->status;
            if ($request->hasfile('logo') && $request->logo != '') {
                $destination1 = 'logoupload/logos/' . $updatelogo->logo;
                // dd($destination1);
                if (FacadesFile::exists($destination1)) {
                    FacadesFile::delete($destination1);
                    // return true;
                }
                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('logoupload/logos/', $filename);
                $updatelogo->logo = $filename;
            }
            // $data =  $upemp->profile;
            $updatelogo->update();
            return back()->with('status', 'Logo successfully updated.');
        // }else{
        //     return redirect('bladelogin')->with('status', 'Please kindly Login!');
        // }

    }

    public function updatesignature(Request $request)
    {
        // if(Auth::check()){
            $updatesign = User::find(Auth::user()->id);
            // $update->status = $request->status;
            if ($request->hasfile('signature') && $request->signature != '') {
                $destination1 = 'signupload/signature/' . $updatesign->signature;
                // dd($destination1);
                if (FacadesFile::exists($destination1)) {
                    FacadesFile::delete($destination1);
                    // return true;
                }
                $file = $request->file('signature');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('signupload/signature/', $filename);
                $updatesign->signature = $filename;
            }
            // $data =  $upemp->profile;
            $updatesign->update();
            return back()->with('status', 'Signature successfully updated.');
        // }else{
        //     return redirect('bladelogin')->with('status', 'Please kindly Login!');
        // }

    }
}
