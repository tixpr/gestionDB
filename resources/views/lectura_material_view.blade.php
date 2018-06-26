@extends('base')
@section('contenido')
    <button id="obtener">
        Obtener
    </button>
    <ul id="contenido">
    </ul>
    <script>
        Majax.setConfig(2,'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','')
        var boton =document.getElementById('obtener')
        function animacion(){
            var elementos = document.querySelectorAll('div.cantidad');
            for(var i=0,n =elementos.length;i<n;i++){
                var porcentaje =parseInt(elementos[i].getAttribute('data-p'));
                var parent = elementos[i].parentElement;
                var width =(porcentaje*parent.clientWidth)/100;
                elementos[i].style.width= width+'px';
                
                //elementos[i].setAttribute('width',width);
            }
        }
        boton.addEventListener('click',function(){
            var majax =new Majax(),
            contenido=document.getElementById('contenido');
            majax.get(
                'api/lectura_material_views',
                {
                    valid:function(r){
                        console.info(r);
                        var data =r.data,
                            temp =null,
                            temp2 =null,
                            temp3 =null,
                            temp4 =null,
                            temp5 =null,
                            temp6 =null,
                            temp7 =null;
                            contenido.innerHTML="";
                            var max=data[0].cantidad,
                                porcentaje=0;
                        for(var i=0,n =data.length;i<n;i++){
                            temp =document.createElement('div');
                            temp.classList.add('contenedor');

                            temp2 =document.createElement('h3');
                            temp2.classList.add('title1');
                            temp2.innerHTML=data[i].title;
                            temp6 =document.createElement('h3');
                            temp6.classList.add('title2');
                            temp6.innerHTML=data[i].type;
                            temp7 =document.createElement('h3');
                            temp7.classList.add('title3');
                            temp7.innerHTML=data[i].area;

                            temp3 =document.createElement('div');
                            temp3.classList.add('cantidad');
                            porcentaje=(data[i].cantidad/max)*100;
                            //temp3.style.width=porcentaje+'%';
                            temp3.setAttribute('data-p',porcentaje);
                            temp4 =document.createElement('span');
                            temp4.innerHTML=data[i].cantidad;
                            temp.appendChild(temp4);
                            temp.appendChild(temp3);
                            temp5 =document.createElement('div');
                            temp5.classList.add('item');
                            temp5.appendChild(temp2);
                            temp5.appendChild(temp6);
                            temp5.appendChild(temp7);
                            temp5.appendChild(temp);
                            temp =document.createElement('li');
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