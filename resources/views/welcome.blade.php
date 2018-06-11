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
            Obtener Idiomas
        </button>
        <button id="btn3">
            Obtener Material
        </button>
        <button id="btn4">
            Obtener Usuario
        </button>
        <script>
            Majax.setConfig(2,'GHChy1fxGnY2RjsiI341ojgdqhyRZqqs9PsSPLTE','');
            function obetenerMateriales(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materials',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('ver1').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn1').addEventListener('click',obetenerMateriales);
        </script>
        <script>
            Majax.setConfig(2,'GHChy1fxGnY2RjsiI341ojgdqhyRZqqs9PsSPLTE','');
            function obetenerIdioma(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/languages',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('ver2').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn2').addEventListener('click',obetenerIdioma);
        </script>
        <script>
            Majax.setConfig(2,'GHChy1fxGnY2RjsiI341ojgdqhyRZqqs9PsSPLTE','');
            function obetenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtypes',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('ver3').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn3').addEventListener('click',obetenerTipoMaterial);
        </script>
        <script>
            Majax.setConfig(2,'GHChy1fxGnY2RjsiI341ojgdqhyRZqqs9PsSPLTE','');
            function obetenerUsuarios(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/user',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('ver4').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn4').addEventListener('click',obetenerUsuarios);
        </script>
        <div id="ver1"></div>
        <div id="ver2"></div>
        <div id="ver3"></div>
        <div id="ver4"></div>
    </body>
</html>
