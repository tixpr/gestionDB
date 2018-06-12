
@section('content')
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
		<link href={{asset('css/disenio.css')}} rel="stylesheet" type="text/css">
		
    </head>
    <body>
		<div id="boton">
			<button id="btn">
				Obtener datos generales.
			</button>
			<button id="btn1">
				Obtener lenguaje.
			</button>
			<button id="btn2">
				Obetener tipos de materiales.
			</button>
		</div>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'j5P39w70XikKLtaVEPiJdEr3C1atcV0qzHM0mZ2A','');
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
								ds1.innerHTML = ds1.innerHTML + "  Título: "+ s.titulo + "  Idioma: "+ s.idioma + "  Tipo: "+ s.tipo;
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

		
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'j5P39w70XikKLtaVEPiJdEr3C1atcV0qzHM0mZ2A','');
			function obtenerLanguages(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							ds2 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds2.innerHTML = ds2.innerHTML + " Idioma: "+ s.lenguaje;
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
		
		
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'j5P39w70XikKLtaVEPiJdEr3C1atcV0qzHM0mZ2A','');
			function obtenerMaterialTypes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialstype',
					{
						valid: function(r){
							console.info(r);
							ds3 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds3.innerHTML = ds3.innerHTML + " Tipo: "+ s.tipo;
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn2').addEventListener('click',obtenerMaterialTypes);

		</script>
		<div id="s1"></div>
    </body>
</html>