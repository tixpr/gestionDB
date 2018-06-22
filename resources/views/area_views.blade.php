@extends('base')
@section('contenido')
<button id ="obtenerAreas">obtener areas</button>

<div class="container_dialog">
        <dialog close class = "dialog" id = "dialog">
            <ol id="contenido">

            </ol>
        </dialog>
     </div>

<script>
   Majax.setConfig(2,'mSIhIZNNv4skowwlmVgPtFdUEklXdZGqwIFCIW6k','');
  

















   var boton2 = document.getElementById('obtenerAreas')
   boton2.addEventListener('click',function(e){
    dialog.setAttribute('open','true')
      e.preventDefault();
       var majax = new Majax();
       contenido = document.getElementById('contenido');
       majax.get(
           '/api/area_views',{
               valid:function(r){
                console.info(r);
                   var data = r.data,
                    temp  = null,
                    temp2 = null,
                    temp3 = null,
                    temp4 = null,
                    temp5= null;
                   contenido.innerHTML="";
                   for(var i = 0, n = data.length; i<n;i++){
                       temp = document.createElement('div');
                       temp.classList.add('contenedor');
                       temp2 = document.createElement('h3');
                       temp2.classList.add('title');
                       temp2.innerHTML=data[i].area ;
                       temp3 = document.createElement('div');
                       temp3.classList.add('cantidad');
                       
                       temp4=document.createElement('span');
                       temp4.innerHTML=data[i].cantidad_vistas;
                       temp.appendChild(temp4);
                       temp.appendChild(temp3);

                       temp5 = document.createElement('div');
                       temp5.classList.add('item');
                        temp5.appendChild(temp2);
                        temp5.appendChild(temp);


                       temp =document.createElement('li');
                       temp.appendChild(temp5);
                       contenido.appendChild(temp);
                       console.log('se ejecuto el for ');

                   }
                  
               },
               error:function(error){
                   console.error;
               }
           }
       );

   },false);
  






</script>
@endsection