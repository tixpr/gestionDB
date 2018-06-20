<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/333.css" rel="stylesheet" type="text/css">
        <script src="/js/majax.js"></script>
    </head>
    <body>
		<form id="formulario">
			<input type="text" name="name" id="name">
			<button type="submit">
				INGRESAR NOMBRE DE USUARIO-CANTIDAD DE VECES LEIDO Y TITULO
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenciontitulocantidadleido,false);
			function obtenciontitulocantidadleido(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/usuario_lectura',
					{
						valid: function(r){
							//console.info(r.data);
							contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var Nombre = document.createElement('p');
								var Titulo = document.createElement('p');
                                var Nrolectura = document.createElement('p');

								Nombre.innerHTML = 'Nombre: '+r.data[i].nombre;
								Titulo.innerHTML = 'Titulo: '+r.data[i].titulo;
                                Nrolectura.innerHTML = 'NroLeidos: '+r.data[i].nro_leido;

								contenedor.appendChild(Nombre);
								contenedor.appendChild(Titulo);
								contenedor.appendChild(Nrolectura);

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
