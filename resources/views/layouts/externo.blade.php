<html>
    <head>  <title>@yield('title')</title>  </head>
    <body>
        @section('sidebar')
        ----------------------------------------------------------------------<br>
        | Uma bela barra superior (use a imagina&ccedil;&atilde;o)        |<br>
        ----------------------------------------------------------------------
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
