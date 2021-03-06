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
        {{-- Navigation --}}
        @include('components.pages.navbar')

        {{-- Page Content --}}
        @yield('content')

        {{-- Footer --}}
        @include('components.pages.footer')

        {{-- Script --}}
        @stack('before-script')
        @include('components.script')
        @stack('after-script')
    </body>
</html>
