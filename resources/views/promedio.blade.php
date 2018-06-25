@extends('baseProm')
@section('contents')
        <form id="formulario">
		<select name="id" id="id">
			<option id="o1" value="">---Escoja un Nombre---</option>
			@foreach($materials as $mat)
				<option value="{{$mat->id}}">{{ $mat->title }}</option>
			@endforeach
		</select>
            <button type="submit">
                OBTENER
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
					'/api/prom_materials',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('lo');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('p');
                                var tipo = document.createElement('p');
								var area = document.createElement('p');
                                var lecturas = document.createElement('p');
				
								titulo.innerHTML = 'Titulo del Material: '+r.data[i].titulo;
                                tipo.innerHTML = 'Tipo del Material: '+r.data[i].tipo;
								area.innerHTML = 'Area del Material: '+r.data[i].area;
                                lecturas.innerHTML = 'Lecturas del Material: '+r.data[i].lecturas;
                                contenedor.appendChild(titulo);
								contenedor.appendChild(tipo);
								contenedor.appendChild(area);
								contenedor.appendChild(lecturas);
								
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