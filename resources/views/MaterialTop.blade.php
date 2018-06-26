@extends('base')
@section('contenido')
<button id="obtener" class="btn">
	Obtener Los Materiales que esten por encima de la media
</button>
<ol id="contenido">
</ol>
<script>
	Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
	var boton = document.getElementById('obtener');
	function animacion(){
		var elementos = document.querySelectorAll('div.cantidad');
		for(var i = 0, n = elementos.length; i<n; i++){
			var porcentaje = parseInt(elementos[i].getAttribute('data-p'));
			var parent = elementos[i].parentElement;
			var width = (porcentaje*parent.clientWidth)/100;
			elementos[i].style.width = width+'px';
			
		}
	}
	boton.addEventListener('click',function(e){
		e.preventDefault();
		var majax = new Majax(),
			contenido = document.getElementById('contenido');
		majax.get(
			'/api/MaterialTop',
			{
				valid: function(r){
					console.info(r);
					var data = r.data,
						temp = null,
						temp1 = null,
						temp2 = null,
						temp3 = null,
						temp4 = null,
						temp5 = null,
						t1 = null,
						t2 = null,
						t3 = null;
					contenido.innerHTML="";
					var max = data[0].cantidad,
						porcentaje = 0;
					for(var i = 0,n = data.length; i<n; i++){
						// asignand a la vaiable temp un div
						temp = document.createElement('div');
						// asignando la clase contenedor a la variable temp que esta con un div
						temp.classList.add('contenedor');
						// asignando la tiqueta h3 a la variable temp2
						temp2 = document.createElement('h3');
						// asignando la clase title a la variable temp2
						temp2.classList.add('title');
						// asignando los datos de materiales  en la variable temp 2
						temp2.innerHTML ="Material:  " +data[i].material;
						t1 = document.createElement("h3");
						t1.classList.add('type');
						t1.innerHTML="Tipo:  " +data[i].type;

						t2 = document.createElement("h3");
						t2.classList.add('area');
						t2.innerHTML="Area:  "+data[i].area;


						




						// asignando un div a la variable temp3
						temp3 = document.createElement('div');
						// asignando la clase cantidad a la variable temp3
						temp3.classList.add('cantidad');
						// calculando el porcentaje con respecto a la cantidad
						porcentaje = (data[i].cantidad/max)*100;
						// sustituyendo el atributo datat-p por el de porcentaje
						temp3.setAttribute('data-p',porcentaje);
						// asignando un span a la variable temp4
						temp4 = document.createElement('span');
						// obteniendo la cantida para asignar al div4
						temp4.innerHTML = data[i].cantidad;
						// asignando los datos de cantidad a un div
						temp.appendChild(temp4);

						temp.appendChild(temp3);	
						temp5 = document.createElement('div');
						temp5.classList.add('item');
						t3 = document.createElement('div');
						t3.classList.add('item2');
						t4 = document.createElement('div');
						t4.classList.add('item3');
						temp5.appendChild(temp2);
						t3.appendChild(t1);
						t4.appendChild(t2);
						t3.appendChild(temp);
						t4.appendChild(temp);						
						temp5.appendChild(temp);
						temp = document.createElement('li');
						temp.appendChild(temp5);
						temp.appendChild(t3);
						temp.appendChild(t4);

						contenido.appendChild(temp);
					}

					setTimeout(animacion,500);
				},
				error: function(error){
					console.error(error);
				}
			}
		);
	},true);
</script>
@endsection