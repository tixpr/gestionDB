@extends('base')
@section('contenido')
<form id="formulario">
	<legend>
		Creando un nuevo material
	</legend>
	<label for="identificador">
		Id del material
	</label>
	<input type="number" name="identificador" id="identificador">
	<label for="title">
		Titulo
	</label>
	<input type="text" name="title" id="title">
	<label for="language">
		Idioma
	</label>
	<select name="language" id="language">
		@foreach($languages as $language)
		<option value="{{$language->id}}">{{$language->language}}</option>
		@endforeach
	</select>
	<label for="edition">
		Edición
	</label>
	<input type="number" name="edition" id="edition">
	<label for="year">
		Año
	</label>
	<input type="number" name="year" id="year">
	<label for="material_type">
		Tipo de material
	</label>
	<select name="material_type" id="material_type">
		@foreach($material_types as $material_type)
		<option value="{{$material_type->id}}">{{$material_type->type}}</option>
		@endforeach
	</select>
	<label for="abstract">
		Resumen
	</label>
	<textarea name="abstract" id="abstract"></textarea>
	<label for="isbn">ISBN</label>
	<input type="number" name="isbn" id="isbn">
	<button type="submit">
		Crear
	</button>
</form>
<script>
	Majax.setConfig(2, 'iBSFp2p9tC8bsB2SznYdPbXIMQLooAGoJDWcX7nL','');
	var form = document.getElementById('formulario');
	form.addEventListener('submit',function(e){
		e.preventDefault();
		var majax = new Majax(),
			identificador = document.getElementById('identificador').value;
		majax.put(
			'/api/material/'+identificador,
			{
				valid: function(r){
					alert('material actualizado satisfactoriamente');
					form.reset();
					console.info(r);
				},
				error: function(error){
					console.error(error);
				}
			},
			//agregando los datos
			{
				type:'form',
				//los datos estan dentro de la variable form que seleccionamos arriba
				data: form
			}
		);
	},false);
</script>
@endsection