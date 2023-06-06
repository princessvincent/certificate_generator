@extends('layouts.app', ['page' => __('Dashboard'), 'pageSlug' => 'Dashboard'])

@section('content')
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" id="collect-user-email" class="btn btn-success">Proceed</button>

                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8">

            <h4>Kindly click on the instruction, in the sidebar to read the Instructions given before you proceed to upload
                CSVFILE</h4><br>
            <div class="card">
                <div class="card-header">
                    <h5 class="title"style="font-size:200%;">
                        {{ __('Upload your CSVFILE to generate Bulk certificates') }}</h5>
                </div>
                <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="csvfile" class="col-md-6 mb-3"
                                style="font-size:20px;"><b>{{ __('CSV File') }}</b></label>

                            <div class="col-md-12">
                                <input id="csvfile" type="file"
                                    class="form-control @error('csvfile') is-invalid @enderror" name="csvfile"
                                    value="{{ old('csvfile') }}" autocomplete="csvfile" accept=".csv" required>
                                @error('csvfile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit_file"
                            class="btn btn-fill btn-primary submit_file">{{ __('Upload') }}</button>
                    </div>
                </form>
            </div>

            {{-- </div> --}}
        </div>
    </div>
@endsection
