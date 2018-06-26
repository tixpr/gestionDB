@extends('base')
@section('contenido')
<button id="obtener">
   Obtener materials_views
</button>    
<ol  id="contenido">
</ol>
<script>
 
   Majax.setConfig(2, '22bBFDz5RRAWl92LOzlcrqFGuReWipgRFkUo6gzo','')
			var boton = document.getElementById('obtener');
			boton.addEventListener('click',function (e){
                e.preventDefault();
				var majax = new Majax();
                    contenido = document.getElementById('contenido');
					majax.get(
					'/api/material_views',
					{
						valid: function(r){
							console.info(r);
                            var data = r.data,
                              temp =null,
                              temp2 =null;
                            contenido.innerHTML = "";
							for(var i = 0, n = r.data.length; i<n; i++){
								 temp = document.createElement('span');
                                 temp.innerHTML=data[i].title+"("+data[i].cantidad+")";
                                 temp2=document.createElement('div');
                                 temp2.appendChild(temp);
                                 temp = document.createElement('li');
                                 temp.appendChild(temp2);
								contenido.appendChild(temp);
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