@extends('layout')

@section('content')
	<section id="botones">
		<button id="btn-1">
			OBTENER DATOS
		</button>
		<button id="btn-2">
			OBTENER IDIOMAS
		</button>
		<button id="btn-3">
			OBTENER TIPOS DE MATERIALES
		</button>
	</section>
	<ul id="contenido">
	</ul>
	<script>
		Majax.setConfig(1, 'bGfL9hVnurTx5sNdtaqbAveVQYVlVVTPbQypw6N4','');
		var contenido =  document.getElementById('contenido');
		function obtenerMateriales(e){
			e.preventDefault();
			var majax = new Majax();
			majax.get(
				'/api/materials',
				{
					valid: function(r){
						//console.info(r.data);
						contenido.innerHTML = ' ';
						for(var i=0, n = r.data.length; i<n ;i++){
							var temp = document.createElement('li');
							var contenedor = document.createElement('div');
							var titulo = document.createElement('h4');
							var resumen = document.createElement('p');
							var tipo = document.createElement('span');
							var idioma = document.createElement('span');
							titulo.innerHTML = 'Titulo: '+r.data[i].titulo;
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
						//conosole.info(r.data);
					},
					error: function(error){
						console.error(error);
					}
				}
			);
		}
		document.getElementById('btn-1').addEventListener('click',obtenerMateriales);
	</script>
	<script>
		Majax.setConfig(1, 'bGfL9hVnurTx5sNdtaqbAveVQYVlVVTPbQypw6N4','');
		function obtenerLanguages(e){
			e.preventDefault();
			var majax = new Majax();
			majax.get(
				'/api/languages',
				{
					valid: function(r){
						console.info(r);
						ds1 =  document.getElementById('vista');
							r.data.forEach(function (s) {
								ds1.innerHTML = ds1.innerHTML +"<div class='lan'>"+"Idioma: " + s.idioma + "</div>";
							});
						console.info(r.data);
					},
					error: function(error){
						console.error(error);
					}
				}
			);
		}
		document.getElementById('btn-2').addEventListener('click',obtenerLanguages);
	</script>	
	<script>
		Majax.setConfig(1, 'bGfL9hVnurTx5sNdtaqbAveVQYVlVVTPbQypw6N4','');
		function obtenerMaterialTypes(e){
			e.preventDefault();
			var majax = new Majax();
			majax.get(
				'/api/materialTypes',
				{
					valid: function(r){
						console.info(r);
						ds1 =  document.getElementById('vista');
							r.data.forEach(function (s) {
								ds1.innerHTML = ds1.innerHTML +"<div class='lan'>"+"Tipo de material: " + s.tipo + "</div>";
							});
						console.info(r.data);
					},
					error: function(error){
						console.error(error);
					}
				}
			);
		}
		document.getElementById('btn-3').addEventListener('click',obtenerMaterialTypes);
	</script>
	<div id="vista">
	</div>
@endsection