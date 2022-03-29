@extends('layout.user.master')

@section('title', 'User Dashboard')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome to Dashboard ({{auth()->user()->name}})</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">

  </div>
</div>

<div id="shortUrl"></div>




@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>

  <script src="{{ asset('js/react/react.js') }}"></script>
@endpush
