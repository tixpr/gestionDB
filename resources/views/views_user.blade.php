 
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Busqueda Por Usuario</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css"> 
        <script src="/js/majax.js"></script>
        
    </head>
    <body>
     <form action="" id = "formulario">
         <h1>Vista Según Usuario</h1>
        <input type="text" name="materials" id="user_id">
        <button type="submit">Obtener</button>
     
     </form>
     <div class="contenido" id = "contenido"></div>
        <script>
        var formulario = document.getElementById('formulario');
        Majax.setConfig(2,'qMbXnApaA1BM7qCEmdWc9APqWh0OneDp7eyJFjgq','');
        var contenido = document.getElementById('contenido');
        formulario.addEventListener('submit',obtenerDatos,true);

        function obtenerDatos(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materialsReadUser',
                {
                    valid: function(r){
                        console.table(r.data);
                        contenido.innerHTML='';
                        
                    },
                    error: function(error){
                        console.info(error);
                    }
                },
                {
                    type: 'form',
                    data: formulario
                }

            );


            
        }
        </script>
        
    </body>
</html>

