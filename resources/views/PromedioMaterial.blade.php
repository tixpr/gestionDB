@extends('base')
@section('contenido')
<button id="obtener">
   Obtener areas vistas
</button>    
<ol  id="contenido">
</ol>
<script> 
   Majax.setConfig(2, '22bBFDz5RRAWl92LOzlcrqFGuReWipgRFkUo6gzo','')
			var boton = document.getElementById('obtener');

            function animacion(){
                var elementos = document.querySelectorAll('div.cantidad');
                for(var i = 0 , n= elementos.length;i<n; i++){
                    var porcentaje = parseInt(elementos[i].getAttribute('data-p'));
                    var parent = elementos[i].parentElement;
                    var width =(porcentaje*parent.clientWidth)/100;
                    elementos[i].style.width = width+ 'px';

                }
            
            }
			boton.addEventListener('click',function (e){
                e.preventDefault();
				var majax = new Majax();
                    contenido = document.getElementById('contenido');
					majax.get(
					'/api/material_promedio',
					{
						valid: function(r){
							console.info(r);
                            var data = r.data,
                              temp =null,
                              temp2 =null,
                              temp3 =null,
                              temp4 =null,
                              temp5 =null;
							  temp8 =null,//6
                              temp9 =null;//7

                            contenido.innerHTML = "";
                            var max = data[0].cantidad,
                            porcentaje =0;

							for(var i = 0, n = r.data.length; i<n; i++){ 
                                temp = document.createElement('div');
                                temp.classList.add('contenedor');

                                temp2 = document.createElement('h3');
                                temp2.classList.add('title');
                                temp2.innerHTML='TITULO:  ' + data[i].title;

								temp8 = document.createElement('h3');
                                temp8.classList.add('title');
                                temp8.innerHTML='TIPO:   ' + data[i].type;

                               
                                temp9 =document.createElement('h3');
								temp9.classList.add('title');
                                temp9.innerHTML= 'AREA:  ' +data[i].area;

						     	temp3 = document.createElement('div');
                                temp3.classList.add('cantidad');
                                porcentaje = (data[i].cantidad/max)*100;
                                temp3.setAttribute('data-p',  porcentaje);

                                temp4 =document.createElement('span');
                                temp4.innerHTML='PROMEDIO:   ' +data[i].cantidad;

                                temp.appendChild(temp4);
                                temp.appendChild(temp3);

                                temp5 = document.createElement('div');
                                temp5.classList.add('item');
                                temp5.appendChild(temp2);    
                                temp5.appendChild(temp8); 
								temp5.appendChild(temp9);
								temp5.appendChild(temp);     

                                temp = document.createElement('li');     
                                temp.appendChild(temp5);
								contenido.appendChild(temp);
                            }
                            setTimeout(animacion,500);
						},
						error: function(error){
							console.error(error);
						}
					}
                );
},false);
</script>
@endsection