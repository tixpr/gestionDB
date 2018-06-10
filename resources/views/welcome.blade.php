 
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TAREA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css"> 
        <script src="/js/majax.js"></script>
        
    </head>
    <body>
    <div class="content" id="content">
       
            <button id="btn_Materials">
                Obtener  Datos Materials
            </button>
            <button id="btn_Languages">
                Obtener  Datos Languages
            </button>
            <button id="btn_MaterialTypes">
                Obtener  Datos TypeMaterial
            </button>
        
        
     </div>
        <script>
        Majax.setConfig(2,'qMbXnApaA1BM7qCEmdWc9APqWh0OneDp7eyJFjgq','');
        function obtenerMateriales(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materials',
                {
                    valid: function(r){
                        console.table(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );


            
        }
        document.getElementById('btn_Materials').addEventListener('click',obtenerMateriales);
        function obtenerLanguage(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/Languages',
                {
                    valid: function(r){
                        console.info(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );

        }

        document.getElementById('btn_Languages').addEventListener('click',obtenerLanguage);



        function obtenerMaterialType(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/MaterialTypes',
                {
                    valid: function(r){
                        console.info(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );
        }
        document.getElementById('btn_MaterialTypes').addEventListener('click',obtenerMaterialType);
        
        </script>
        
    </body>
</html>

