<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	<header>
		<h1><marquee behavior="alternate">SERVICIO DE CONSULTA</marquee>
	</header>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="/js/majax.js"></script>
        <link rel="stylesheet" href="/css/styles.css">

    </head>
    <body>
        <form id="formulario">
            <input type="number" name="user_id" id="user_id">
            <button type="submit">
                OBTENER
            </button>
        </form>
       <div id="contenido">
        </div>
        <script>
            var formulario=document.getElementById('formulario');
            Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
            var contenido=document.getElementById('contenido');
            formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/user_materials_view',
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
                        data:formulario
                    }
				);
			}
        </script> 
    </body>
</html>