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
		<form id="formulario">
			<input type="number" name="language_id" id="language_id">
			<button type="submit">
				Obtener Cantidad de Materiales por Idioma
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'u8eZrTBppnU4JXdPUymRDHynS5KApTvMV4rTYni3','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/language_materials_quantity',
					{
						valid: function(r){
							console.info(r.data);
							contenido.innerHTML = '';

							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var Idioma = document.createElement('h4');
								var Libros = document.createElement('p');
								/*var leidos = document.createElement('span');*/
								
								Idioma.innerHTML = 'Idioma: '+r.data[i].Idioma + "(" + i + ")";
								Libros.innerHTML = 'Titulo: '+r.data[i].Libros;
								
								contenedor.appendChild(Idioma);
								contenedor.appendChild(Libros);
								
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
