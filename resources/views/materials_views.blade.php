@extends('base')
@section('contenido')
<button id="obtener">
obtener
</button>
<ol id="contenido">
</ol>
<script>
     Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
     var boton=document.getElementById('obtener');
     boton.addEventListener('click',function(e){

            e.preventDefault();
				var majax = new Majax();
                var contenido=document.getElementById('contenido');
				majax.get(
					'/api/material_views',
                    {
                        valid:function(r){
                            console.info(r);
                            var data =r.data,
                                temp = null,
                                temp2 = null;
                             contenido.innerHTML="";
                            for(var i=0, n=r.data.length;i<n;i++)
                            {
                            temp = document.createElement('span');
                            temp.innerHTML='TITULO :'+"</br>"+r.data[i].titulo+"</br>" +'CANTIDAD DE VISTAS: '+"</br>"+data[i].cantidad+"</br>";
                            temp2 = document.createElement('div');
                            temp2.appendChild(temp);
                            temp = document.createElement('li');
                            temp.appendChild(temp2);
                            contenido.appendChild(temp);

                        }
                        },
                        error:function(error){
                            console.error();
                        }
                       
                    }

            );
     },false);
    </script>
@endsection