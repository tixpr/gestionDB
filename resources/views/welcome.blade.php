<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/estilos.css" rel="stylesheet" type="text/css"> 
        <script src="/js/majax.js"></script>
        
    </head>
    <body>
    <div id="contenedor">
        <button id="btn">
            Obtener  Datos Materials
        </button>
        <button id="btn1">
            Obtener  Datos Languages
        </button>
        <button id="btn2">
            Obtener  Datos TypeMaterial
        </button>
        
     </div>
        <script>
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        function obtenerMateriales(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materials',
                {
                    valid: function(r){
                        console.info(r);
                        document.getElementById('mostrar3').innerHTML=JSON.stringify(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );
            
        }
        document.getElementById('btn').addEventListener('click',obtenerMateriales);
        </script>
        <script>
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        function obtenerLenguajes(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/languages',
                {
                    valid: function(r){
                        console.info(r);
                        document.getElementById('mostrar3').innerHTML=JSON.stringify(r);
                    },
                    error: function(error){
                        console.error(error);
                        
                    }
                }

            );

        }
        document.getElementById('btn1').addEventListener('click',obtenerLenguajes);
        </script>

        <script>
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        function obtenerMaterialType(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materialstype',
                {
                    valid: function(r){
                        console.info(r);
                        document.getElementById('mostrar3').innerHTML=JSON.stringify(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );
        }
        document.getElementById('btn2').addEventListener('click',obtenerMaterialType);
        </script>
        <section id="mostrar1"></section>
        <section id="mostrar2"></section>
        <section id="mostrar3"></section>
    </body>
</html>
