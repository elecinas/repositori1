<!DOCTYPE html>
<html lang="en">
    <head>
        @include('theme.partials.head')
    </head>
    <body class="animsition">
        <style type="text/css">
            .page-wrapper { 
                position: relative; 
                top: 58px;
            }

            @media (min-width: 991px) {
                .page-wrapper {
                    position: relative;
                    
                }
                .header-desktop {
                    position: fixed;
                    top: 58px;
                }
                .menu-sidebar {
                    position: fixed;
                    top: 58px;
                }
            }

        </style>
        @include('extractos.nav')
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