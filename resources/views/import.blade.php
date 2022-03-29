@extends('layout.user.master')

@section('title', 'Import CSV')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload CSV') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="csv" class="col-md-4 col-form-label text-md-right">{{ __('Import CSV') }}</label>

                                <div class="col-md-6">
                                    <input id="csv" type="file" class="form-control @error('csv') is-invalid @enderror" name="csv" value="{{ old('csv') }}" required autofocus>

                                    @error('csv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6 offset-4">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>





        <div class="row mt-5 justify-content-center">
            <div id="customers">

            </div>
        </div>
    </div>



@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>

    <script src="{{ asset('js/react/react.js') }}"></script>
@endpush

