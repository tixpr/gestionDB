
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
		<link href={{asset('css/cret.css')}} rel="stylesheet" type="text/css">
		
    </head>
    <body>
		<div id="boton">
			<button id="btn">
				GET DATES .
			</button>
			<button id="btn1">
				GET lenguage.
			</button>
			<button id="btn2">
				GET types_materials.
			</button>
		</div>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'EKV7Yeqx9IX8ZiWhwBREzyPRPYZ61Fxfs8X79LC9','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
							xs1 = document.getElementById('cn');
							r.data.forEach(function(s){
								xs1.innerHTML = xs1.innerHTML + "  TITULO: "+ s.titulo + "  IDIOMA: "+ s.idioma + "  TIPO: "+ s.tipo;
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
			Majax.setConfig(2, 'EKV7Yeqx9IX8ZiWhwBREzyPRPYZ61Fxfs8X79LC9','');
			function obtenerLanguages(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							xs2 = document.getElementById('cn');
							r.data.forEach(function(s){
								xs2.innerHTML = xs2.innerHTML + " Idioma: "+ s.lenguaje;
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
			Majax.setConfig(2, 'EKV7Yeqx9IX8ZiWhwBREzyPRPYZ61Fxfs8X79LC9','');
			function obtenerMaterialTypes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialstype',
					{
						valid: function(r){
							console.info(r);
							xs3 = document.getElementById('cn');
							r.data.forEach(function(s){
								xs3.innerHTML = xs3.innerHTML + " TIPO: "+ s.tipo;
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
		<div id="cn"></div>
    </body>
</html>