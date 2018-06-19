
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
		<link href="css/estilos.css" rel="stylesheet">
    </head>
    <body>
		<button id="btn1">
			Obtener datos
		</button>
<<<<<<< HEAD
		<button id="btn2">
			Obtener Datos de Lenguaje
		</button>
		<button id="btn3">
			Obtener Datos Tipo Material
		</button>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'XVkLHrMhCPJPk49zFFJPNHJY1rFeM9bv3VSeR2iv','');
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
								ds1.innerHTML = ds1.innerHTML + "  TITULO: "+ s.titulo + "  IDIOMA: "+ s.idioma + "  TIPO: "+ s.tipo + "  RESUMEN: "+ s.resumen + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn1').addEventListener('click',obtenerMateriales);
		</script>

		<script>
			Majax.setConfig(2, 'XVkLHrMhCPJPk49zFFJPNHJY1rFeM9bv3VSeR2iv','');
			function obtenerLenguaje(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + " Idioma: "+ s.idioma + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn2').addEventListener('click',obtenerLenguaje);
		</script>

		<script>
			Majax.setConfig(2, 'XVkLHrMhCPJPk49zFFJPNHJY1rFeM9bv3VSeR2iv','');
			function obtenerTipoMaterial(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialstype',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + " TIPO: "+ s.tipo + "</br>";
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
			document.getElementById('btn3').addEventListener('click',obtenerTipoMaterial);
		</script>
		<div id="s1"></div>
    </body>
</html>
