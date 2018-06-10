@extends('layout')

@section('content')
	<div id="contenido">
		<button id="btn-1">
			Obtener Materials
		</button>
		<script>
			Majax.setConfig(1, 'bGfL9hVnurTx5sNdtaqbAveVQYVlVVTPbQypw6N4','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
							ds1 =  document.getElementById('vista');
								r.data.forEach(function (s) {
									ds1.innerHTML = ds1.innerHTML +"<div class='mat'>"+"<ul>"+"<li>"+"Titulo: "+ s.titulo+"</li>"+"<li>"+" Idioma: "+ s.idioma+"</li>"+"<li>"+"Tipo: "+ s.tipo +"</li>"+"</ul>"+"</div>";
								});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn-1').addEventListener('click',obtenerMateriales);
		</script>

		<button id="btn-2">
			Obtener Languages
		</button>
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

		<button id="btn-3">
			Obtener MaterialTypes
		</button>
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
			<ul></ul>
		</div>
	</div>
@endsection