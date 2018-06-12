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
        <button id="btn">
            Obtener Datos
        </button>
        <button id="btnusu">
            Obtener Usuarios
        </button>
        <button id="btnl">
            Obtener Idiomas
        </button>
        <button id="btntm">
            Obtener Tipo de Material
        </button>

            <script>
                Majax.setConfig(2,'vbAQvKWoZKNvbTARRRmVW24khsv7ox8IhnwMNAgY','');
                function obtenerMateriales(e) {
                    e.preventDefault();
                     var majax= new Majax();
                     majax.get(
                     '/api/material', {
                                valid:function (r) {
                                console.info(r);
                                document.getElementById("a").innerHTML=JSON.stringify(r);
                                },
                              error: function(error){
                            console.error(error);
                        }
                     }
                 );
            }
            document.getElementById('btn').addEventListener('click',obtenerMateriales);
            </script>
             <div id="a"></div>

            <script>
                Majax.setConfig(2,'vbAQvKWoZKNvbTARRRmVW24khsv7ox8IhnwMNAgY ','');
                function obtenerUsuarios(e){
                    e.preventDefault();
                    var majax= new Majax();
                    majax.get(
                        '/api/user',
                        {
                            valid:function (r) {
                                console.info(r);
                                document.getElementById("b").innerHTML=JSON.stringify(r);
                            },
                            error: function(error){
                                console.error(error);
                            }
                        }
                    );
                }
                document.getElementById('btnusu').addEventListener('click',obtenerUsuarios);
            </script>
            <div id="b"></div>

            <script>
                Majax.setConfig(2,'vbAQvKWoZKNvbTARRRmVW24khsv7ox8IhnwMNAgY','');
                function obtenerIdioma(e) {
                    e.preventDefault();
                    var majax= new Majax();
                    majax.get(
                        '/api/languages',
                        {
                            valid:function (r) {
                                console.info(r);
                                document.getElementById("c").innerHTML=JSON.stringify(r);
                            },
                            error: function(error){
                                console.error(error);
                            }
                        }
                    );
                }
                document.getElementById('btnl').addEventListener('click',obtenerIdioma);
            </script>
            <div id="c"></div>

            <script>
            Majax.setConfig(2,'vbAQvKWoZKNvbTARRRmVW24khsv7ox8IhnwMNAgY','');
            function obtenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtypes',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById("d").innerHTML=JSON.stringify(r);
                            /* document.getElementById("m").innerHTML=alert(JSON[l].type);*/
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btntm').addEventListener('click',obtenerTipoMaterial);
        </script>
        <div id="d"></div>
        </body>
</html>
