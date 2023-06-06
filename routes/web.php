<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\CertificateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::put('profile/logo', ['as' => 'profile.logo', 'uses' => 'App\Http\Controllers\CertificateController@updatelogo']);
	// Route::put('profile/sign/', ['as' => 'profile.sign/', 'uses' => 'App\Http\Controllers\CertificateController@updatesignature']);
    Route::put('updatelogo/{id}', [CertificateController::class,'updatelogo'])->name('updatelogo');
    Route::put('updatesignature/{id}', [CertificateController::class,'updatesignature'])->name('updatesignature');
    Route::get('editlogoandsign', [CertificateController::class,'editlogoandsign'])->name('editlogoandsign');

});

Route::get('template', function(){
	return view('certtemplate');
});

Route::get('instruction', function(){
    return view('instruction');
});

Route::post('upload',[CertificateController::class, 'upload'])->name('upload');

Route::get('/downloadcsv', function () {
    $path = storage_path('app/public/studentinformation.csv');

    if (!Storage::exists($path)) {

    }

    return Response::download($path, 'studentinformation.csv');
});
