@extends('base')
@section('contenido')
<button id ="obtener">
    Obtener
</button>
<ol id="contenido">
</ol>
<script>
    Majax.setConfig(2,'vbAQvKWoZKNvbTARRRmVW24khsv7ox8IhnwMNAgY','');
    var boton=document.getElementById('obtener');
    
    function animacion(){
        var elementos=document.querySelectorAll('div.cantidad_r3');
        for(var i=0, n=elementos.length;i<n;i++){
            var porcentaje=parseInt(elementos[i].getAttribute('data-p'));
            var parent=elementos[i].parentElement;
            var width=(porcentaje*parent.clientWidth)/100;
            elementos[i].style.width=width+'px';
        }
    }

    boton.addEventListener('click',function(e){
        e.preventDefault();
        var majax= new Majax(), 
        contenido=document.getElementById('contenido');
        majax.get(
            '/api/mediaViews', {
                valid:function (r) {
                    console.info(r);
                    var data=r.data,
                    temp=null,
                    temp2=null,
                    temp3=null,
                    temp4=null,
                    temp5=null
                    temp6=null
                    temp7=null;
                   contenido.innerHTML="";
                    var max=data[0].Cantidad;
                    porcentaje=0;
                    for(var i =0,n=data.length;i<n; i++){
                        temp=document.createElement('div');
                        temp.classList.add('contenedor');

                        temp2=document.createElement('h3');
                        temp2.classList.add('title');
                        temp2.innerHTML=data[i].Titulo;

                        temp6=document.createElement('h3');
                        temp6.classList.add('title2');
                        temp6.innerHTML=data[i].Tipo;

                        temp7=document.createElement('h3');
                        temp7.classList.add('title3');
                        temp7.innerHTML=data[i].Area;

                        temp3=document.createElement('div');
                        temp3.classList.add('cantidad_r3');
                        porcentaje=(data[i].Cantidad/max)*100;
                        temp3.setAttribute('data-p',porcentaje);

                        temp4=document.createElement('span');
                        temp4.innerHTML=data[i].Cantidad;

                        temp.appendChild(temp3);
                        temp.appendChild(temp4);

                        temp5=document.createElement('div');
                        temp5.classList.add('item');
                        temp5.appendChild(temp2);
                        temp5.appendChild(temp6)
                        temp5.appendChild(temp7)
                        temp5.appendChild(temp);

                        temp=document.createElement('li');
                        temp.appendChild(temp5);
                        contenido.appendChild(temp)
                        
                       
                    }
                    setTimeout(animacion,500);
                },
                error: function(error){
                console.error(error);
                }
            }
        );  
    }, false);
</script>
@endsection