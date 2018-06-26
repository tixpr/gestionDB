@extends('base')
@section('contenido')
<button id="obtener">
    Obtener CANTIDAD
</button>
<ol id="contenido">
</ol>
<script>
    Majax.setConfig(2, 'AFy5o7N15EusXKTJ4KsvXoBUnnHv8LdsesN85o6rQ','');
    var boton = document.getElementById('obtener');
    function animacion(){
        var elementos =  document.querySelectorAll('div.cantidad');
        for(var i = 0 , n = elementos.length ; i<n ; i++){
            var porcentaje = parseInt(elementos[i].getAttribute('data-p'));      //porcentaje se transforma en cada, y luego transformamos a entero
            var parent = elementos[i].parentElement;
            var width = (porcentaje*parent.clientWidth)/100;                 //todo el ancho de la caja, el 100% es clientWidth
            elementos[i].style.width = width + 'px';
            //elementos[i].setAttribute('width',width+'px');
        }
    }
    boton.addEventListener('click', function(e){
        e.preventDefault();
        var majax = new Majax();
            contenido = document.getElementById('contenido');
        majax.get(
            'api/read_materials_half',
            {
                valid:  function(r){
                    console.info(r);
                    var data= r.data,
                       temp = null,
                       temp2 = null
                       temp3 = null
                       temp4 = null
                       temp5 = null
                       temp6 = null
                       temp7 = null;
                    contenido.innerHTML = "";
                    var max = data[0].cantidad,
                        porcentaje = 0;
                    for(var i = 0 , n = data.length; i<n ; i++){
                        temp = document.createElement('div');
                        temp.classList.add('contenedor');
                        temp2 = document.createElement('h3');
                        temp2.classList.add('title');
                        temp2.innerHTML = 'TÍTULO:   ' + data[i].titulo;
                        temp6 = document.createElement('h3');
                        temp6.classList.add('type');
                        temp6.innerHTML = 'TIPO DE MATERIAL:   ' + data[i].tipo_material;
                        temp7 = document.createElement('h3');
                        temp7.classList.add('area');
                        temp7.innerHTML = 'ÁREA:   ' + data[i].areas;
                        temp3 = document.createElement('div');
                        temp3.classList.add('cantidad');
                        porcentaje = (data[i].cantidad/max)*100;
                        temp3.setAttribute('data-p',porcentaje);
                        temp4 = document.createElement('span');        //classList--metodo proporcionado por HTML5
                        temp4.innerHTML = 'VECES LEIDA:   ' +  data[i].cantidad;
                        temp.appendChild(temp4);
                        temp.appendChild(temp3);                    //a temp le agregamos la cantidad (temp3)
                        temp5 = document.createElement('div');
                        temp5.classList.add('item');
                        temp5.appendChild(temp2);        //a temp 5 le agregamos el temp2
                        temp5.appendChild(temp);
                        temp = document.createElement('li');
                        temp.appendChild(temp5);
                        contenido.appendChild(temp)
                        contenido.appendChild(temp6)
                        contenido.appendChild(temp7)
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

