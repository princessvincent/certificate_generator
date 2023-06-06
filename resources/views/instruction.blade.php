@extends('layouts.app', ['page' => __('Dashboard'), 'pageSlug' => 'Dashboard'])

@section('content')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @if (session('status'))
         <script>
             swal("{{ session('status') }}");
         </script>
     @endif
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h5 class="title"style="font-size:200%;">
                        {{ __('INSTRUCTIONS') }}</h5>
                </div>
               <div class="card-body">

                <p>
                Ensure to upload your Company Logo and signature to be able to generate bulk certificates <br>
                 using your own logo and signature else your certificates will be generated using our <br>
                 customized signature and logo.
                </p>

                <p>
                    To update your signaure/logo, click at the top right and click on profile.
                </p><br><br>

                <p id="text" class="mb-5" style="font-size:100%;">Make Sure to Compile Your Csv File With Our
                    Downloadable Sample Csv File</p>

                    <span>Have a wonderfull experience using our Bulk Certificate generator</span>
               </div>
            </div>

            {{-- </div> --}}
        </div>
    </div>
@endsection



