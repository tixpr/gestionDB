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
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
							datos = document.getElementById('f1');
							r.data.forEach(function(s){
                                datos.innerHTML= datos.innerHTML +"Titulo:"+s.titulo+"Idioma:"+s.idioma+"Tipo:"+s.tipo+"</br>";
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
    </body>
</html>
