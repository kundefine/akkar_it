@extends('layout.app')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
    <style>
        .left-side {
            border-right: 2px solid #ddd;
            padding-right: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 left-side">
                <div class="card">
                    <div class="card-header">{{ __('Notice') }}</div>

                    <div class="card-body">
                        <div id="content">
                            Welcome to DigiCart Portal
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <ul class="timeline mr-0" style="max-width: 100%;margin-left: 120px;">
                    <li class="event" data-date="12:30 - 1:00pm">
                        <h3>Registration</h3>
                        <p>Get here on time, it's first come first serve. Be late, get turned away.</p>
                    </li>
                    <li class="event" data-date="2:30 - 4:00pm">
                        <h3>Opening Ceremony</h3>
                        <p>Get ready for an exciting event, this will kick off in amazing fashion with MOP & Busta Rhymes as an opening show...
                            <a href="">@HR Apu</a></p>
                        <button class="btn btn-primary mt-2">See Details </button>
                    </li>
                    <li class="event" data-date="5:00 - 8:00pm">
                        <h3>Main Event</h3>
                        <p>This is where it all goes down. You will compete head to head with your friends and rivals. Get ready!</p>
                    </li>
                    <li class="event" data-date="8:30 - 9:30pm">
                        <h3>Closing Ceremony</h3>
                        <p>See how is the victor and who are the losers. The big stage is where the winners bask in their own glory.</p>
                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')

@endpush
