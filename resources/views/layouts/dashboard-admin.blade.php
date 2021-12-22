<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>@yield('title')</title>

        @stack('before-style')
        @include('components.style')
        @stack('after-style')
    </head>

    <body>
        <div class="page-dashboard">
            <div class="d-flex" id="wrapper" data-aos="fade-right">
                @include('components.dashboard.sidebar-admin')

                <div id="page-content-wrapper">
                    @include('components.dashboard.navbar-admin')

                    @yield('content')
                </div>
            </div>
        </div>
        {{-- Script --}}
        @stack('before-script')
        @include('components.script')
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        @stack('after-script')
    </body>
</html>
