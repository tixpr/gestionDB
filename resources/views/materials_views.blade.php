@extends('base')
@section('contenido')
<button id ="obtener">obtener materials</button>
<button id ="obtenerAreas">obtener areas</button>

<div class="container_dialog">
        <dialog close class = "dialog" id = "dialog">
            <ol id="contenido">

            </ol>
        </dialog>
     </div>

<script>
   Majax.setConfig(2,'ehxXRzGmqqdjbmsBZ9CVfAIo4nYjO3pU7QXkOlG9','');
   
   var boton = document.getElementById('obtener');
   var contenido = document.getElementById('contenido');
   boton.addEventListener('click',function(e){
    dialog.setAttribute('open','true')
      e.preventDefault();
       var majax = new Majax();
       
       majax.get(
           '/api/material_views',{
            valid:function(r){
                   console.info(r);
                   var data = r.data,
                    temp  = null,
                    temp2 = null;
                   contenido.innerHTML="";
                   for(var i = 0, n = data.length; i<n;i++){
                       temp = document.createElement('span');
                       temp.innerHTML=data[i].title + "("+data[i].cantidad+")";
                       temp2 =document.createElement('div');
                       temp2.appendChild(temp);
                       temp =document.createElement('li');
                       temp.appendChild(temp2);
                       contenido.appendChild(temp);
                       console.log('se ejecuto el for ');

                   }
                   
        document.getElementById('obtener')
        .addEventListener('click',()=>{});
               },
               error:function(error){
                   console.error;
               }
           }
       );

   },false);
























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
                    temp2 = null;
                   contenido.innerHTML="";
                   for(var i = 0, n = data.length; i<n;i++){
                       temp = document.createElement('span');
                       temp.innerHTML=data[i].area + "("+data[i].cantidad_vistas+")";
                       temp2 =document.createElement('div');
                       temp2.appendChild(temp);
                       temp =document.createElement('li');
                       temp.appendChild(temp2);
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