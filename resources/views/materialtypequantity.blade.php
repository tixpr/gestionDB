@extends('base')
@section('contenido')
<button id="obtener">
    obtener
</button>
<ol id="contenido"> 
</ol>

<script>
    Majax.setConfig(2, 'u8eZrTBppnU4JXdPUymRDHynS5KApTvMV4rTYni3','');
    var boton = document.getElementById('obtener');

    function animacion(){
        var elementos = document.querySelectorAll('div.cantidad2');
        for(var i = 0, n = elementos.length; i<n; i++)
        {
            var porcentaje = parseInt(elementos[i].getAttribute('data-p'));
            var parent = elementos[i].parentElement;
            var width = (porcentaje*parent.clientWidth)/100; //REGLA DE TRES SIMPLE. clientWidth es todo el ancho de la caja
            elementos[i].style.width = width+'px';
            //elementos[i].setAttribute('width',width);

        }
    }

    boton.addEventListener('click',function(e)
    {
        e.preventDefault();
        var majax = new Majax(),
        contenido = document.getElementById('contenido');
        majax.get(
            'api/material_type_views',
            {
                valid: function(r){
                    console.info(r);
                    var data = r.data,
                        temp = null,
                        temp2 = null
                        temp3 = null
                        temp4 = null
                        temp5 = null;
        
                    contenido.innerHTML = "";
                    var max = data[0].cantidad; /*El q tiene mayor cantidad datos es el maximo */
                        porcentaje = 0;
                    for(var i = 0, n = r.data.length; i<n; i++)
                    {
                        temp = document.createElement('div');
                        temp.classList.add('contenedor');

                        temp2 =document.createElement('h3');
                        temp2.classList.add('title');
                        temp2.innerHTML = data[i].tipo;

                        temp3 = document.createElement('div');
                        temp3.classList.add('cantidad2');
                        porcentaje = (data[i].cantidad/max)*100;
                        //temp3.style.width = porcentaje+'%';
                        temp3.setAttribute('data-p',porcentaje);

                        temp4 = document.createElement('span');
                        temp4.innerHTML = data[i].cantidad;
                        temp.appendChild(temp4); /* Al temp le agregamos el temp4 */
                        temp.appendChild(temp3); /* Al temp le agregamos el temp3 */

                        temp5 = document.createElement('div');
                        temp5.classList.add('item');
                        temp5.appendChild(temp2) /* Al temp5 le agregamos el temp2 */
                        temp5.appendChild(temp) /* Al temp5 le agregamos el temp */
                        
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