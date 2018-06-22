@extends('base')
@section('contenido')
	<button id="obtener">
		OBTENER
	</button>
	<ol id="contenido">
	</ol>
	<script>
		Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
		var boton = document.getElementById('obtener');
		boton.addEventListener('click', function(e){
			e.preventDefault();
			var majax = new Majax();
			majax.get(
				'/api/material_views',
				{
					valid: function(r){
						console.info(r);
                        var data = r.data,
                        temp = null;
						temp2 = null;
						contenido.innerHTML ="";
						for(var i=0, n=data.length;i<n;i++){
                            temp = document.createElement('div');
							temp.classList.add('porcentaje')
							temp2 = document.createElement('h3');
                            temp.innerHTML = data[i].title+"("+data[i].cantidad+")";
							temp2 = document.createElement('div');
							temp2.appendChild(temp)
							temp = document.createElement('li');
							temp.appendChild(temp2)
                            contenido.appendChild(temp);
								/*var temp = document.createElement('lo');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h2');
                                var cantidad = document.createElement('t');
				
								titulo.innerHTML = 'Titulo del Material: '+r.data[i].title;
                                cantidad.innerHTML = 'Cantidad: '+r.data[i].cantidad;
                                contenedor.appendChild(titulo);
								contenedor.appendChild(cantidad);
								
								temp.appendChild(contenedor);
								contenido.appendChild(temp);*/
						}
					},
					error: function(error){
						console.error(error);
					}
				}
			);
		},false);
	</script>
@endsection