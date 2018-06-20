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
			<input type="text" name="name" id="name">
			<button type="submit" id="botoncito">
				Obtener Cantidad Materiales Leidos Por Usuario
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'u8eZrTBppnU4JXdPUymRDHynS5KApTvMV4rTYni3','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerMaterialesLeidos,false);
			function obtenerMaterialesLeidos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/user_materials_reading',
					{
						valid: function(r){
							console.info(r.data);
							contenido.innerHTML = '';

                            for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var nombre = document.createElement('h4');
								var titulo = document.createElement('p');
								var leidos = document.createElement('span');
								
								nombre.innerHTML = 'Nombre: '+r.data[i].nombre + "(" + i + ")";
								titulo.innerHTML = 'Titulo: '+r.data[i].titulo;
								leidos.innerHTML = 'Materiales Leidos: '+r.data[i].leidos;
								
								contenedor.appendChild(nombre);
								contenedor.appendChild(title);
								contenedor.appendChild(reading);
								
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
