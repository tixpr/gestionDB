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
		<button id="btn02">
			Obtener datos lenguajes
		</button>
		<button id="btn03">
			Obtener datos Tipomaterial
		</button>
	</div>
		<script>
			Majax.setConfig(2, 'Rs3KbBqSyEsV39Pd9LdyAX6EVHg5kUnuf6SuMZsQ','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
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
