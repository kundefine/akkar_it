<div class="row">
    <div class="col-md-12">
        @if (session()->has('primary'))
            <!-- Primary Alert -->
                <div class="alert alert-primary alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Primary</h3>
                    <p class="mb-0">{{session()->get('primary')}}<a class="alert-link" href="javascript:void(0)"></a>!</p>
                </div>
                <!-- END Primary Alert -->
        @endif

        @if (session()->has('secondary'))
            <!-- Secondary Alert -->
                <div class="alert alert-secondary alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Secondary</h3>
                    <p class="mb-0">{{session()->get('secondary')}}<a class="alert-link" href="javascript:void(0)"></a>!</p>
                </div>
                <!-- END Secondary Alert -->
        @endif

        @if (session()->has('info'))
            <!-- Info Alert -->
                <div class="alert alert-info alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Information</h3>
                    <p class="mb-0">{{session()->get('info')}}<a class="alert-link" href="javascript:void(0)"></a>!</p>
                </div>
                <!-- END Info Alert -->
        @endif

        @if (session()->has('success'))
            <!-- Success Alert -->
                <div class="alert alert-success alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                    <p class="mb-0">{{session()->get('success')}}<a class="alert-link" href="javascript:void(0)"></a>!</p>
                </div>
                <!-- END Success Alert -->
        @endif

        @if (session()->has('warning'))
            <!-- Warning Alert -->
                <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="alert-heading font-size-h4 font-w400">Warning</h3>
                    <p class="mb-0">{{session()->get('warning')}}<a class="alert-link" href="javascript:void(0)"></a>!</p>
                </div>
                <!-- END Warning Alert -->
        @endif


        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="alert-heading font-size-h4 font-w400">Error</h3>
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}<a class="alert-link" href="javascript:void(0)"></a>!</p>
                @endforeach
            </div>
        @endif
    </div>
</div>
