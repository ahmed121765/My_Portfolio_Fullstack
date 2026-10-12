<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>
    <div class="main-wrapper">

        @include('admin.layouts.sidebar')

        <!-- partial -->

        <div class="page-wrapper">

            @include('admin.layouts.headerbar')
            <!-- partial -->

            <div class="page-content">

                @yield('content')

            </div>

            @include('admin.layouts.footer')
            <!-- partial -->

        </div>
    </div>

    @include('admin.layouts.scripts')

</body>

</html>