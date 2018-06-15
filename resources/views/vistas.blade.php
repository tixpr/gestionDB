<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
		<link href="css/mud.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <form id="formulario">
    <input type="numer" name="user_id" id="user_id">
    <button type="submit">
    obtener
    </button>
    </from>
		<div id="contenido" +>
		</div>
		<script>
        var formulario=document.getElementById('formulario');
            Majax.setConfig(2, 'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
            var contenido=document.getElementById('contenido');
            formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
                e.preventDefault();
                var user_value=document.getElementById('user_id').value;
				var majax = new Majax();
				majax.get(
					'/api/user_materials_view',
					{
						valid: function(r){
                            console.info(r.data);
                            contenido.innertHTML='';

						},
						error: function(error){
							console.error(error);
						}
                    },
                    {
                        type:'json',
                        data: {
                            user_id:user_value
                        }
                    }
				);
			}
		</script>
          <body>
		</html>


		