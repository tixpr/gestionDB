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
        <button id="btnl">
            Obtener Idiomas
        </button>
        <button id="btnmt">
            Obtener Material
        </button>
        <div id="contenido">
        </div>
        <script>
            Majax.setConfig(2,'GOp0YZulCy3AAgjbNJtwxTHfrRRgS8hHHX5mzB2N','');
            function obetenerMateriales(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materials',
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
            document.getElementById('btn').addEventListener('click',obetenerMateriales);
        </script>
        <script>
            Majax.setConfig(2,'GOp0YZulCy3AAgjbNJtwxTHfrRRgS8hHHX5mzB2N','');
            function obetenerIdioma(e) {
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
            document.getElementById('btnl').addEventListener('click',obetenerIdioma);
        </script>
        <script>
            Majax.setConfig(2,'GOp0YZulCy3AAgjbNJtwxTHfrRRgS8hHHX5mzB2N','');
            function obetenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtypes',
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
            document.getElementById('btnmt').addEventListener('click',obetenerTipoMaterial);
        </script>
    </body>
</html>
