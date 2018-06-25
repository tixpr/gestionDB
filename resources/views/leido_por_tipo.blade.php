@extends('base')
@section('contenido')
<form id="formulario">
			
			<button type="submit">
				Obtener
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'LL6U6oFRXdRvUPlViyjgR8gS9jCrEBnprWHXO7yJ','');

			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/leido_por_tipo',
					{
						valid: function(r){
							
							for(var i=0, n=r.data.length;i<n;i++){
								var temp1 = document.createElement('li');
								var contenedor1 = document.createElement('div');
								var titulo = document.createElement('h3');
                                var vistas = document.createElement('h3');

				
								titulo.innerHTML = 'Tipo del Material: ->'+r.data[i].tipo;
                                vistas.innerHTML = 'Vistas: ->'+r.data[i].veces_leido;
                                contenedor1.appendChild(titulo);
								contenedor1.appendChild(vistas);
								
								temp1.appendChild(contenedor1);
								contenido.appendChild(temp1);
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