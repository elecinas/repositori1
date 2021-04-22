<!DOCTYPE html>
<html lang="en">
    <head>
        @include('theme.partials.head')
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            {{-- @include('theme.partials.nav' --}}
            @include('theme.partials.header')
            @include('theme.partials.sidebar')
            <!-- PAGE CONTAINER-->
            <div class="page-container">
                @include('theme.partials.headerdesktop')
                @yield('content')
            </div>
        </div>
        {{-- @include('theme.partials.footer') --}}
        @include('theme.partials.footer-scripts')
    </body>
</html>