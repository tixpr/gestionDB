@extends('visualizar')
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
		<link href="{{asset('css/estilos.css')}}" rel="stylesheet">
    </head>
    <body>
		<div id="boton">
			<button id="btn">
				OBTENER TODOS LOS MATERIALES
			</button>
			<button id="btn1">
				OBTENER LOS LENGUAJES
			</button>
			<button id="btn2">
				OBTENER LOS TIPOS DE
			</button>
		</div>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'GjUvTbVchJndT6uBzH3GiLiJQPf6xzsvM7bjtAgg','');
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
								ds1.innerHTML = ds1.innerHTML + "  TITULO: "+ s.titulo + "  IDIOMA: "+ s.idioma + "  TIPO: "+ s.tipo;
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
			Majax.setConfig(2, 'GjUvTbVchJndT6uBzH3GiLiJQPf6xzsvM7bjtAgg','');
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
								ds2.innerHTML = ds2.innerHTML + " Idioma: "+ s.idioma;
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
			Majax.setConfig(2, 'GjUvTbVchJndT6uBzH3GiLiJQPf6xzsvM7bjtAgg','');
			function obtenerMaterialTypes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialTypes',
					{
						valid: function(r){
							console.info(r);
							ds3 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds3.innerHTML = ds3.innerHTML + " TIPO: "+ s.tipo;
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
