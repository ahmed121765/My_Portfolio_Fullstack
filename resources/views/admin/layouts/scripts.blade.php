<!-- core:js -->
<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/template.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(session()->has('message'))
        var type = "{{ session('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info(" {{ session('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ session('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ session('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ session('message') }} ");
                break;
        }
    @endif
</script>

@yield('scripts')