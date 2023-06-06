@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if (session('status'))
            <script>
                swal("{{ session('status') }}");
            </script>
        @endif --}}
        <div class="col-md-8">
            @include('alerts.success')
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">

                    <div class="card-body">
                        @csrf
                        @method('put')



                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email address') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Update Logo') }}</h5>
                </div>
                <form method="post" action="{{ url('updatelogo/' . Auth::user()->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        {{-- @include('alerts.success') --}}
                        <div class="col-md-12">
                            <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror"
                                name="logo" value="{{ old('logo') }}" autocomplete="logo" required>
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Update logo') }}</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Update Signature') }}</h5>
                </div>
                <form method="post" action="{{ url('updatesignature/' . Auth::user()->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        {{-- @include('alerts.success') --}}

                        <div class="col-md-12">
                            <input id="signature" type="file"
                                class="form-control @error('signature') is-invalid @enderror" name="signature"
                                value="{{ old('signature') }}" autocomplete="signature" required>
                            @error('signature')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Update Signature') }}</button>
                    </div>
                </form>
            </div>


        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        @if (Auth::user()->logo == "")
                        <a href="#">
                            <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                            <h5 class="title">{{ auth()->user()->name }}</h5>
                        </a>

                        @else
                        <a href="#">
                        <img class="avatar" src="{{ asset('logoupload') }}/logos/{{ Auth::user()->logo }}" alt="">
                        <h5 class="title">{{ auth()->user()->name }}</h5>
                        </a>
                        @endif

            </div>
        </div>
    </div>
@endsection
