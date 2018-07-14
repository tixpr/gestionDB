@extends('base')
@section('contenido')
<form id="formulario">
	<legend>
		eliminado un nuevo material
	</legend>
	<label for="material">
		Id del material a eliminar
	</label>
	<input type="number" name="material" id="material" required="true">
	<button type="submit">
		eliminar
	</button>
</form>
<script>
	Majax.setConfig(2, 'iBSFp2p9tC8bsB2SznYdPbXIMQLooAGoJDWcX7nL','');
	var form = document.getElementById('formulario');
	form.addEventListener('submit',function(e){
		e.preventDefault();
		var majax = new Majax(),
			id = document.getElementById('material').value;
		majax.delete(
			'/api/material/'+id,
			{
				valid: function(r){
					alert('material eliminado satisfactoriamente');
					form.reset();
					console.info(r);
				},
				error: function(error){
					console.error(error);
				}
			}
		);
	},false);
</script>
@endsection