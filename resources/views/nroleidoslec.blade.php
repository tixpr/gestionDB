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
			<button type="submit">
				GET CANTID READING  
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, '22bBFDz5RRAWl92LOzlcrqFGuReWipgRFkUo6gzo','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenertitlecantlect,false);
			function obtenertitlecantlect(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/UsersMaterials',
					{
						valid: function(r){
                            contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var nombre = document.createElement('h4');
								var titulo = document.createElement('p');
								var leido = document.createElement('span');
								
							    nombre.innerHTML = 'Nombre: '+r.data[i].nombre;
								titulo.innerHTML = 'Titulo: '+r.data[i].titulo;
								leido.innerHTML = 'Nroleidos: '+r.data[i].leido;
								

								contenedor.appendChild(nombre);
								contenedor.appendChild(titulo);
								contenedor.appendChild(leido);

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

