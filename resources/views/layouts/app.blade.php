    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Profesores') }}</title>
      
        
        <!-- Scripts -->
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery.js')}}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lpm.css') }}" rel="stylesheet">
        
        <!--Jquery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-dark bg-dark">
        
                <a href="{{route('profesor')}}" style="width:  200px" class="btn btn-outline-info">Profesores </a>

                <a href="licencias.html"  style="width:  200px" class="btn btn-outline-info">Licencias </a>
          
                <a href="Carreras.html"  style="width:  200px" class="btn btn-outline-info">Carreras y Materias </a> 
             
                <a href="Designacion.html"  style="width:  200px" class="btn btn-outline-info">Designacion de Materias</a> 
              
                <a  style="width:  200px" href="index.html" class="btn btn-outline-info">Cerrar Sesion</a>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

       
    </body>
</html>
