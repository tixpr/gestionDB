@extends('layout')

@section('content')
<h1>Consultas</h1>
<h2>Obtener los materiales leídos por un usuario (nombre)</h2>
<form id="formulario">
	<label for="">Nombre de Usuario:</label>
	<input type="text" name="name" id="name">
	<button type="submit">
		Obtener
	</button>
</form>

<ul id="contenido">
</ul>
<script>
	var formulario = document.getElementById('formulario');
	Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
	var contenido = document.getElementById('contenido');
	formulario.addEventListener('submit',obtenerMaterial,false);
	function obtenerMaterial(e){
		e.preventDefault();
		var majax = new Majax();
		majax.get(
			'/api/user_materials_for_name',
			{
				valid: function(r){
					console.info(r.data);
					contenido.innerHTML = '';
					for(var i=0, n=r.data.length;i<n;i++){
                        var temp = document.createElement('li');
                        var contenedor = document.createElement('div');
                        var titulo = document.createElement('h4');
                        var leido = document.createElement('span');
                        titulo.innerHTML = 'Título: '+r.data[i].titulo;
                        leido.innerHTML = 'Vistas: '+r.data[i].leido;
                        contenedor.appendChild(titulo);
                        contenedor.appendChild(leido);
                        temp.appendChild(contenedor);
                        contenido.appendChild(temp);
                    }
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