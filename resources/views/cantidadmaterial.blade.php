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
    </head>
    <body>
		<form id="formulario">
			<input type="number" name="user_id" id="user_id">
			<button type="submit">
				GET NUMBER MATERIALS
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, '22bBFDz5RRAWl92LOzlcrqFGuReWipgRFkUo6gzo','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerCantidadMat,false);
			function obtenerCantidadMat(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/user_materials_view',
					{
						valid: function(r){
							console.info(r.data);
							contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h4');
								var vistas = document.createElement('p');
						        titulo.innerHTML = 'Titulo: '+r.data[i].titulo ;
								vistas.innerHTML = 'Resumen: '+r.data[i].vistas;
					

								contenedor.appendChild(titulo);
								contenedor.appendChild(vistas);
								

								temp.appendChild(contenedor);
								contenido.appendChild(temp);
							}
						},
						error: function(error){
							console.error(error);
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
