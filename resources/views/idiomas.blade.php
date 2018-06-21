@extends('layout')

@section('content')
<h1>Consultas</h1>
<h2>Cantidad de Materiales por Lenguaje</h2>
<form id="formulario">
    <label>Código de lenguje:</label>
    <input type="number" name="language_id" id="language_id">
    <button type="submit">
        Obtener
    </button>
</form>
<ul id="contenido">
</ul>
<script>
    var formulario = document.getElementById('formulario');
    Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
    var contenido = document.getElementById('contenido');
    formulario.addEventListener('submit',obtenerConsulta,false);
    function obtenerConsulta(e){
        e.preventDefault();
        var majax = new Majax();
        majax.get(
            '/api/language_materials',
            {
                valid: function(r){
                    console.info(r.data);
                    contenido.innerHTML = '';
                    for(var i=0, n=r.data.length;i<n;i++){
                        var temp = document.createElement('li');
                        var contenedor = document.createElement('div');
                        var idioma = document.createElement('h4');
                        var cantidad = document.createElement('h4');
                        idioma.innerHTML = 'Idioma: '+r.data[i].idioma;
                        cantidad.innerHTML = 'Cantidad de Materiales: '+r.data[i].cantidad;
                        contenedor.appendChild(idioma);
                        contenedor.appendChild(cantidad);
                        temp.appendChild(contenedor);
                        contenido.appendChild(temp);
                    }
                },
                error: function(error){
                    console.error(error);
                }
            },
            {
                type: 'form',
                data: formulario
            }
        );
    }
</script>
@endsection