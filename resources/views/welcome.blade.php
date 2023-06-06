@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white"  style="font-size:70px">{{ __('Welcome!') }}</h1>
                        <p class="text-lead text-light" style="font-size:20px">
                            {{ __('Use Our Bulk Certificate Generator And Thank Us Later!.') }}
                        </p>

                        <p class="text-lead text-light" style="font-size:20px">
                            {{ __('Kindly Login To Have The Best Experience!.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
