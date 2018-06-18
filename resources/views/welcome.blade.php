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
		<link href="/css/diseno.css" rel="stylesheet" type="text/css">

    </head>
    <body>
		<button id="btn1">
			Obtener datos
		</button>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'UKyjmffx5NlyvbKPKyluU3pOgfbfdnHzBN3Xaihm','');
=======
    </head>
    <body>
		<button id="btn">
			Obtener datos
		</button>
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
							datos = document.getElementById('f1');
							r.data.forEach(function(s){
                                datos.innerHTML= datos.innerHTML +"Titulo:"+s.titulo+"Idioma:"+s.idioma+"Tipo:"+s.tipo+"</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
							
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
						},
						error: function(error){
							console.error(error);
>>>>>>> dev
						}
					}
				);
			}
<<<<<<< HEAD
			document.getElementById('btn1').addEventListener('click',obtenerMateriales);
		</script>
		<button id="btn2">
			Language 
		</button>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'UKyjmffx5NlyvbKPKyluU3pOgfbfdnHzBN3Xaihm','');
			function obtenerLanguages(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							datos = document.getElementById('f1');
							r.data.forEach(function(s){
                                datos.innerHTML= datos.innerHTML +"Lenguaje: "+s.idioma+"</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn2').addEventListener('click',obtenerLanguages);
		</script>
		<button id="btn3">
			MaterialTypes
		</button>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'UKyjmffx5NlyvbKPKyluU3pOgfbfdnHzBN3Xaihm','');
			function obtenerMaterialTypes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialTypes',
					{
						valid: function(r){
							console.info(r);
							datos = document.getElementById('f1');
							r.data.forEach(function(s){
                                datos.innerHTML= datos.innerHTML +"Tipo:"+s.tipo+"</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn3').addEventListener('click',obtenerMaterialTypes);
		</script>
		<section>
			<h1>LOS DATOS SE MOSTRARAN AQUI:</h1>
		</section>
		<div id="f1">
		</div>
=======
			document.getElementById('btn').addEventListener('click',obtenerMateriales);
		</script>
>>>>>>> dev
    </body>
</html>
