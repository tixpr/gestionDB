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
		<link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<button id="boton">
			Obtener DATOS MATERIALES
		</button>
		<button id="boton1">
			Obtener DATOS LENGUAJE
		</button>
		<button id="boton2">
			Obtener DATOS TIPO DE MATERIAL
		</button>
		<div id="contenido">
		<script>
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
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
								ds1.innerHTML = ds1.innerHTML + "TITULO:  " + s.titulo + "  IDIOMA: " + s.idioma + "  TIPO: " + s.tipo +"</br>"+"</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('boton').addEventListener('click',obtenerMateriales);
		</script>

		<script>
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
			function obtenerDatosLenguajes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "IDIOMA: " + s.idioma + "</br>" + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('boton1').addEventListener('click',obtenerDatosLenguajes);
		</script>

		<script>
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
			function obtenerDatosTipoMaterial(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialtype',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "TIPO:  " + s.tipo + "</br>" + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('boton2').addEventListener('click',obtenerDatosTipoMaterial);
		</script>
		<div id="s1"></div>
		</div>
    </body>
</html>
