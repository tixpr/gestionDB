@extends('base')
@section('contenido')
	<form id="formulario">
		<input type="number" name="user_id" id="user_id">
		<button type="submit">
			Obtener
		</button>
	</form>
	<ul id="contenido">
	</ul>
	<script>
		var formulario = document.getElementById('formulario');
		Majax.setConfig(2, 'CNiPtHgRh1glhpiiAwMLXDCkqfhtGpoA9yAEw5tF','');
		var contenido = document.getElementById('contenido');
		formulario.addEventListener('submit',obtenerDatos,false);
		function obtenerDatos(e){
			e.preventDefault();
			var majax = new Majax();
			majax.get(
				'/api/user_materials_view',
				{
					valid: function(r){
						console.info(r.data);
						contenido.innerHTML = '';
					},
					error: function(error){
						console.error(error);
					}
				},
				{
					type: 'form',
					data: formulario
				}
			);
		}
	</script>
@endsection
