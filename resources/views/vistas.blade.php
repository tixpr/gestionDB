<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="/css/estilo.css" rel="stylesheet" type="text/css"> 
		<link href="/css/responsive.css" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
    </head>
    <body>
		<h1 text-align: center>GESTIÓN BASE DE DATOS</h1>


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
			Majax.setConfig(2, 'AFy5o7N15EusXKTJ4KsvXoBUnnHv8LdsesN85o6rQ','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/user_materials_view',
					{
						valid: function(r){
							console.info(r.data);
							contenido.innerHTML = '';
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

		<h2> Ejercicio 15-06-18</h2>
		<p>Mostrar la cantidad de materiales por idioma</p>
		<button id="btn">
				Obtener Materiales por Lenguaje
		</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'AFy5o7N15EusXKTJ4KsvXoBUnnHv8LdsesN85o6rQ','');
			var contenido = document.getElementById('contenido');
			function obtenerMaterialsLanguage(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languagematerialsview',
					{
						valid: function(r){
							console.info(r);
							contenido.innerHTML = '';
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "IDIOMA: "+ s.Idioma + "  Cantidad: "+ s.Cantidad + "</br>" + "</br>";
							});
							/*console.info(r.data);
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var Idioma = document.createElement('h4');
								var Cantidad = document.createElement('p');

								Idioma.innerHTML = 'Idioma: '+r.data[i].Idioma;
								Cantidad.innerHTML = 'Cantidad: '+r.data[i].Cantidad;
								
								contenedor.appendChild(Idioma);
								contenedor.appendChild(Cantidad);
								
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
							}*/
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn').addEventListener('click',obtenerMaterialsLanguage);
		</script>
		<div id="s1"></div>
    </body>
</html>
