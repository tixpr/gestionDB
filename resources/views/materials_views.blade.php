@extends('base')
@section('contenido')
    <button id="obtener">Obtener</button>
    <ol id="contenido"></ol>
    <script>
        Majax.setConfig(2, 'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
        var boton=document.getElementById('obtener');
        boton.addEventListener('click',function (e) {
            e.preventDefault();
            var majax=new Majax;
            majax.get(
                '/api/material_views',{
                    valid:function (r) {
                        console.info(r);
                    },
                    error:function (error) {
                        console.error(error);
                    }
                }
            );
        },false);
    </script>
@endsection