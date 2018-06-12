<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="/css/estilos.css" type="text/css">
        <script src="/js/majax.js">
        </script>
    </head>
    <body>
        <section id="botones">
            <p id="botona">Obetener Materiales</p>
            <p id="botonb">Obtener Idiomas</p>
            <p id="botonc">Obtener Tipo de Material</p>
        </section>

        <script>
            Majax.setConfig(2,'OW3ugblUSnLhzF4pdAseonjgFW5DQ7jUujrY59ua','');
            function obtenerMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/material',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('mostrar1').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('botona').addEventListener('click',obtenerMaterial);
        </script>
        <script>
            Majax.setConfig(2,'OW3ugblUSnLhzF4pdAseonjgFW5DQ7jUujrY59ua','');
            function obtenerIdioma(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/language',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('mostrar2').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('botonb').addEventListener('click',obtenerIdioma);
        </script>
        <script>
            Majax.setConfig(2,'OW3ugblUSnLhzF4pdAseonjgFW5DQ7jUujrY59ua','');
            function obtenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtype',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('mostrar3').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('botonc').addEventListener('click',obtenerTipoMaterial);
        </script>
        <section id="mostrar1"></section>
        <section id="mostrar2"></section>
        <section id="mostrar3"></section>
    </body>
</html>
