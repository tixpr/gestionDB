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
		<link href="css/mud.css" rel="stylesheet" type="text/css">
    </head>
    <body>
	<div id="contenido">
		<button id="btn">
			Obtener datos
		</button>
		<button id="btn1">
			Obtener Lenguaje
		</button>
		<button id="btn2">
			Obtener Tipo de Material
			
		</button>
		</div>
		<script>
			Majax.setConfig(2, 'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
							d1 = document.getElementById('dis');
							r.data.forEach(function(s){
								d1.innerHTML = d1.innerHTML + "  Titulo: " + s.titulo+"  Idioma: " + s.idioma+"  Tipo: " + s.tipo + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn').addEventListener('click',obtenerMateriales);
		</script>
		<script>
			Majax.setConfig(2, 'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
			function obtenerLanguages(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							d2 = document.getElementById('dis');
							r.data.forEach(function(s){
								d2.innerHTML = d2.innerHTML + " Tipo: " + s.tipo + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn1').addEventListener('click',obtenerLanguages);
		</script>
		<script>
			Majax.setConfig(2, 'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
			function obtenertipoMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialtype',
					{
						valid: function(r){
							console.info(r);
							d3 = document.getElementById('dis');
							r.data.forEach(function(s){
								d3.innerHTML = d3.innerHTML + " Tipo: " + s.tipo + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn2').addEventListener('click',obtenertipoMateriales);
		</script>
		<div id="dis"></div>
    </body>
</html>
