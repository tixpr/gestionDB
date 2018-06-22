@extends('especial')
@section('content')
<form id="formulario">
		<select name="user_id" id="user_id">
			<option id="o1" value="">---Escoja un Nombre---</option>
			@foreach($users as $usuario)
				<option value="{{$usuario->id}}">{{ $usuario->name }}</option>
			@endforeach
		</select>
            <button type="submit">
                OBTENER LECTURAS
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
					'/api/user_materials_view',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('lo');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h2');
                                var vistas = document.createElement('o');
				
								titulo.innerHTML = 'Titulo del Material: '+r.data[i].titulo;
                                vistas.innerHTML = 'Vistas Totales: '+r.data[i].vistas;
                                contenedor.appendChild(titulo);
								contenedor.appendChild(vistas);
								
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