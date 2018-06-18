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
		<script src="/js/majax.js"></script>
    </head>
    <body>
	<div id="contenedor">
		<button id="btn01">
			Obtener datos
		</button>
<<<<<<< HEAD
		<button id="btn02">
			Obtener datos lenguajes
		</button>
		<button id="btn03">
			Obtener datos Tipomaterial
		</button>
	</div>
		<script>
			Majax.setConfig(2, 'Rs3KbBqSyEsV39Pd9LdyAX6EVHg5kUnuf6SuMZsQ','');
=======
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			var contenido = document.getElementById('contenido');
>>>>>>> dev
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
<<<<<<< HEAD
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "TITULO: "+ s.titulo + "  IDIOMA: "+ s.idioma + "  TIPO: "+ s.tipo;
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn01').addEventListener('click',obtenerMateriales);
		</script>

		<script>
			Majax.setConfig(2, 'Rs3KbBqSyEsV39Pd9LdyAX6EVHg5kUnuf6SuMZsQ','');
			function obtenerLanguages(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML +"  IDIOMA: "+ s.lenguaje;
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn02').addEventListener('click',obtenerLanguages);
		</script>

		<script>
			Majax.setConfig(2, 'Rs3KbBqSyEsV39Pd9LdyAX6EVHg5kUnuf6SuMZsQ','');
			function obtenerMaterialType(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialstype',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML +"TIPO: "+ s.tipo + "</br>";
							});
							console.info(r.data);
=======
							//console.info(r.data);
							contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h4');
								var resumen = document.createElement('p');
								var tipo = document.createElement('span');
								var idioma = document.createElement('span');
								titulo.innerHTML = 'Titulo: '+r.data[i].titulo + "(" + i + ")";
								resumen.innerHTML = 'Resumen: '+r.data[i].resumen;
								tipo.innerHTML = 'Tipo: '+r.data[i].tipo;
								idioma.innerHTML = 'Idioma: '+r.data[i].idioma;
								contenedor.appendChild(titulo);
								contenedor.appendChild(resumen);
								contenedor.appendChild(tipo);
								contenedor.appendChild(idioma);
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
							}
>>>>>>> dev
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn03').addEventListener('click',obtenerMaterialType);
		</script>
		<div id="s1"></div>
    </body>
</html>
