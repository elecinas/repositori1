<!doctype html>
<html lang="en">
    @extends('extractos.head')
    <body class="animsition">
        <div class="page-wrapper">
            @extends('extractos.nav')

            @yield('content')

            @extends('extractos.footbootstrap')
        </div>
        {{-- VUE --}}
        <div id="app">
            <example-component></example-component>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        {{-- ENDVUE --}}
    </body>
</html>