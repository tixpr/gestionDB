@extends('base')
@section('contenido')
<button id="obtener">
obtener
</button>
<ol id="contenido">
</ol>
<script>
   Majax.setConfig(2,'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
   var boton=document.getElementById('obtener');
   boton.addEventListener('click',function(e){
       e.preventDefault();
       var majax=new Majax();
       majax.get(
           '/api/material_views',
           {
               valid:function(r){
               
                        console.info(r);
                        var data=r.data,
                         temp=null;
                         temp2=null;
                          contenido.innerHTML="";
                            for(var i=0,n=data.length;i<n;i++){
                            temp=document.createElement('span');
                            temp.innerHTML=data[i].title+"("+data[i].cantidad+")";
                            temp2=document.createElement('div');
                            temp2.appendChild(temp)
                            temp=document.createElement('li');
                            temp.appendChild(temp2)
                            contenido.appendChild(temp)
                            }
               },
               error:function(error){
                   console.error(error);
               }
           }
       );
   },false);
   </script>
   @endsection