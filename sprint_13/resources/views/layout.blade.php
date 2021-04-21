
<!doctype html>
<html lang="en">
    @extends('extractos.head')
    <body>
        @extends('extractos.nav')
        <main class="container">
            <div class="bg-light p-5 rounded">
                @yield('content')
            </div>
            <!-- <a class="btn btn-lg btn-primary" href="" role="button">Error 404 &raquo;</a>-->
        </main>
        @extends('extractos.footbootstrap')
    </body>
</html>

