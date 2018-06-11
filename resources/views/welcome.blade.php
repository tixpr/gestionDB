<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="/css/estilos.css" rel="stylesheet">
		<script src="/js/majax.js"></script>
    </head>
    <body>
	<div id="contenedor">
        <button id="btn1" class="boton">
            Obtener Datos
        </button>
        <button id="btn2" class="boton">
            Obtener Datos De Lenguajes
        </button>
        <button id="btn3" class="boton">
            Obtener Datos De TipoDeMaterial
        </button>
    </div>
        <script>
            Majax.setConfig(2, 'u8eZrTBppnU4JXdPUymRDHynS5KApTvMV4rTYni3','');
            function obtenerMateriales(e){
                e.preventDefault();
                var majax = new Majax();
                majax.get(
                    '/api/materials',
                    {
                        valid: function(r){
                            console.info(r);
                            ds1 = document.getElementById('s1');
                            r.data.forEach(function(s){
                                ds1.innerHTML = ds1.innerHTML + "<div>"+"<ul>"+"TITULO: "+ s.titulo +"</ul>"+"<ul>"+ "  IDIOMA: "+ s.idioma +"</ul>" +"<ul>"+"  TIPO: "+ s.tipo+"</ul>"+"</div>";
                            });
                            console.info(r.data);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn1').addEventListener('click',obtenerMateriales);
        </script>

        <script>
            Majax.setConfig(2, 'u8eZrTBppnU4JXdPUymRDHynS5KApTvMV4rTYni3','');
            function obtenerLanguages(e){
                e.preventDefault();
                var majax = new Majax();
                majax.get(
                    '/api/languages',
                    {
                        valid: function(r){
                            console.info(r);
                            ds1 = document.getElementById('s1');
                            r.data.forEach(function(s){
                                ds1.innerHTML = ds1.innerHTML +"<div>"+"  IDIOMA: "+"</div>"+ s.language;
                            });
                            console.info(r.data);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn2').addEventListener('click',obtenerLanguages);
        </script>

        <script>
            Majax.setConfig(2, 'u8eZrTBppnU4JXdPUymRDHynS5KApTvMV4rTYni3','');
            function obtenerMaterialType(e){
                e.preventDefault();
                var majax = new Majax();
                majax.get(
                    '/api/materialstype',
                    {
                        valid: function(r){
                            console.info(r);
                            ds1 = document.getElementById('s1');
                            r.data.forEach(function(s){
                                ds1.innerHTML = ds1.innerHTML +"<div>"+"TIPO: "+"</div>"+ s.type;
                            });
                            console.info(r.data);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn3').addEventListener('click',obtenerMaterialType);
        </script>
        <div id="s1"></div>

    </body>
</html>
