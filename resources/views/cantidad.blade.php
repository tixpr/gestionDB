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
        <form id="formulario">
            <input type="number" name="id" id=" id">
            <button type="submit">
                Obtener
            </button>
        </form>
        <script>
        var formulario=document.getElementById('formulario');
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        formulario.addEventListener('submit',obtenerDatos,false);
        function obtenerDatos(e){
            e.preventDefault();//recarga página
            var majax= new Majax();
            majax.get(
                '/api/materials_languages_quantity',
                {
                    valid: function(r){
                        console.info(r.data);
                        contenido.innerHTML='';
                    

                    },
                    error: function(error){
                        console.error(error);
                    }
                },
                {
                    type:'form',
                    data: formulario

                }

            );
            
        }
        </script>
     <ul id="contenido">
     </ul>
        
    </body>
</html>
