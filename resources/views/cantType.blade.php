@extends('Tipo')
@section('contenidos')
<form id="formulario">
		<select name="material_type_id" id="material_type_id">
			<option id="o2" value="">---Escoja un Tipo---</option>
			@foreach($material_types as $tipo)
				<option value="{{$tipo->id}}">{{ $tipo->type }}</option>
			@endforeach
		</select>
            <button type="submit">
                OBTENER CANTIDAD
            </button>
        </form>
       <div id="contenido">
        </div>
        <script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/cant_types',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('lo');
								var contenedor = document.createElement('div');
								var tipo = document.createElement('p');
                                var cantidad = document.createElement('p');
				
								tipo.innerHTML = 'Tipo del Material: '+r.data[i].tipo;
                                cantidad.innerHTML = 'Cantidad: '+r.data[i].cantidad;
                                contenedor.appendChild(tipo);
								contenedor.appendChild(cantidad);
								
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
							}},
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