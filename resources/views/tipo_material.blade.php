@extends('base')
@section('contenido')
<button id="obtener">
OBTENER TIPO DE MATERIAL
</button>
<ol id="contenido">
<img src="https://trainers1world.files.wordpress.com/2011/04/material.jpg" heigth="100"/>
</ol>
<script>
   Majax.setConfig(2,'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
   var boton=document.getElementById('obtener');
   function animacion(){
       var elementos=document.querySelectorAll('div.cantidad')
      for(var i=0, n=elementos.length;i<n;i++){
           var porcentaje=parseInt(elementos[i].getAttribute('data-p'));
           var parent=elementos[i].parentElement;
           var width=(porcentaje*parent.clientWidth)/100;
           elementos[i].style.width=width+'px';
       } 
   }
   boton.addEventListener('click',function(e){
       e.preventDefault();
       var majax=new Majax();
       majax.get(
           '/api/tipo_material',
           {
               valid:function(r){
                console.info(r);
                        var data=r.data,
                         temp=null;
                         temp2=null;
                         temp3=null;
                         temp4=null;
                         temp5=null;
                          contenido.innerHTML="";
                          var max=data[0].leido;
                          porcentaje=0;
                            for(var i=0,n=data.length;i<n;i++){
                            temp=document.createElement('div');
                            temp.classList.add('contenedor');
                            temp2=document.createElement('h3');
                            temp2.classList.add('title');
                            temp2.innerHTML='Tipo:  ' + data[i].tipo;
                            temp3=document.createElement('div');
                            temp3.classList.add('cantidad'); 
                            porcentaje=(data[i].leido/max)*100;
                            //temp3.style.width=porcentaje+'%';
                            temp3.setAttribute('data-p',porcentaje);
                            temp4=document.createElement('span');
                            temp4.innerHTML='Cantidad:  '+data[i].leido;
                            temp.appendChild(temp4);
                            temp.appendChild(temp3);
                            temp5=document.createElement('div');
                            temp5.classList.add('item');
                            temp5.appendChild(temp2);
                            temp5.appendChild(temp);
                            temp=document.createElement('li');
                            temp.appendChild(temp5);
                            contenido.appendChild(temp);
                            }
                            setTimeout(animacion,500);
               },
               error:function(error){
                   console.error(error);
               }
           }
       );
   },false);
   </script>
   @endsection