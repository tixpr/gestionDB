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
<<<<<<< HEAD
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
=======
    </head>
    <body>
		<form id="formulario">
			<input type="number" name="user_id" id="user_id">
			<button type="submit">
				Obtener
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
				var majax = new Majax();
				majax.get(
					'/api/user_materials_view',
					{
						valid: function(r){
<<<<<<< HEAD
                            console.info(r.data);
                            contenido.innertHTML='';

=======
							console.info(r.data);
							contenido.innerHTML = '';
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
						},
						error: function(error){
							console.error(error);
						}
<<<<<<< HEAD
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


		
=======
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
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
