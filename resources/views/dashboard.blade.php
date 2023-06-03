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
            {{-- <div class="row align-items-center justify-content-center"> --}}
            <h4 style="font-size:200%;">Generate Dynamic Certificate Just By Uploading Your Compiled Csv File</h4>
            <h5 id="text" class="mb-5" style="font-size:100%;">Make Sure TO Compile Your Csv File With Our
                Downloadable
                Sample Csv File</h5>

            <div class="card">
                <div class="card-header">
                    <h5 class="title"style="font-size:200%;">
                        {{ __('Upload the neccessary Files to generate a certificates') }}</h5>
                </div>
                <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- <div class="row mb-3">
                            <label for="logo" class="col-md-6 mb-3"
                                style="font-size:20px;"><b>{{ __('Company logo if available') }}</b></label>

                            <div class="col-md-12">
                                <input id="logo" type="file"
                                    class="form-control @error('logo') is-invalid @enderror" name="logo"
                                    value="{{ old('logo') }}" autocomplete="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="signature" class="col-md-6 mb-3"
                                style="font-size:20px;"><b>{{ __('Company Signature') }}</b></label>

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
                        </div> --}}

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
                        <button type="submit" id="submit_file" class="btn btn-fill btn-primary submit_file">{{ __('Upload') }}</button>
                    </div>
                </form>
            </div>

            {{-- </div> --}}
        </div>
    </div>
@endsection

{{-- <script>
$(document).ready(function() {
       $('.submit_file').click(function(e) {
        e.preventDefault();

        var data =  JSON.stringify(convertToJson('#csvfile'))
        // var product_qty = $(this).closest('.product_data').find('.qty-input').val();
        // alert(product_id);
        // alert(product_qty);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "upload",
            dataType: 'JSON',
            data: {
                'data': data,
                // 'product_qty': product_qty,
            },
            
            success: function(response) {
                loadcart()
                Swal.fire(response.status);
            }

        })



    });

})

</script> --}}

