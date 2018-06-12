<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="/js/majax.js">
        </script>
    </head>
    <body>
        <button id="btn1">
            Obtener Datos
        </button>
        <button id="btn2">
            Obtener Usuarios
        </button>
        <button id="btn3">
            Obtener Idiomas
        </button>
        <button id="btn4">
            Obtener Tipo de Material
        </button>

            <script>
                Majax.setConfig(2,'6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
                function obtenerMateriales(e) {
                    e.preventDefault();
                     var majax= new Majax();
                     majax.get(
                     '/api/materials', {
                                valid:function (r) {
                                console.info(r);
                                },
                              error: function(error){
                            console.error(error);
                        }
                     }
                 );
            }
            document.getElementById('btn1').addEventListener('click',obtenerMateriales);
            </script>
             <div id="a"></div>

            <script>
                Majax.setConfig(2,'6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck ','');
                function obtenerUsuarios(e){
                    e.preventDefault();
                    var majax= new Majax();
                    majax.get(
                        '/api/users',
                        {
                            valid:function (r) {
                                console.info(r);
                            },
                            error: function(error){
                                console.error(error);
                            }
                        }
                    );
                }
                document.getElementById('btn2').addEventListener('click',obtenerUsuarios);
            </script>
            <div id="b"></div>

            <script>
                Majax.setConfig(2,'6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
                function obtenerIdioma(e) {
                    e.preventDefault();
                    var majax= new Majax();
                    majax.get(
                        '/api/languages',
                        {
                            valid:function (r) {
                                console.info(r);
                            },
                            error: function(error){
                                console.error(error);
                            }
                        }
                    );
                }
                document.getElementById('btn3').addEventListener('click',obtenerIdioma);
            </script>
            <div id="c"></div>

            <script>
            Majax.setConfig(2,'6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
            function obtenerTipo(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/material_types',
                    {
                        valid:function (r) {
                            console.info(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn4').addEventListener('click',obtenerTipo);        </script>
        <div id="d"></div>
        </body>
</html>