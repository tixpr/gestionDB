<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SERVICIOS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="/js/majax.js"></script>        

        <!-- Custom styles for this template -->
        <link href="{{asset('css/estilos.css')}}" rel="stylesheet">
    </head>
    <body>
        <header>
            <!-- Fixed navbar -->
            <div id="principal">
                <section class="titulo">
                    <h1>BIBLIOTECA</h1>
                </section>
                <nav class="menu">
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Noticias</a></li>
                        <li><a href="#">Notificaciones</a></li>
                        <li><a href="#">Mayor Información</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <!-- Begin page content -->
    <main role="main" class="container">
      @yield('content')
    </main>
   


