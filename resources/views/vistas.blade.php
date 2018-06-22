@extends('layout')
@section('content')


@endsection

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="/js/majax.js"></script>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <form id="formulario">
        <label for="">Código de Usuario:</label>
        <input type="number" name="user_id" id="user_id">
        <button type="submit">
            Obtener
        </button>
    </form>
    <ul id="contenido">
    </ul>
    <script>
        var formulario = document.getElementById('formulario');
        Majax.setConfig(2, 'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
        var contenido = document.getElementById('contenido');
        formulario.addEventListener('submit',obtenerDatos,false);
        function obtenerDatos(e){
            e.preventDefault();
            var majax = new Majax();
            majax.get(
                '/api/user_materials_view',
                {
                    valid: function(r){
                        console.info(r.data);
                        contenido.innerHTML = '';
                        for(var i=0, n=r.data.length;i<n;i++){
                            var temp = document.createElement('li');
                            var contenedor = document.createElement('div');
                            var titulo = document.createElement('h4');
                            var vistas = document.createElement('span');
                            titulo.innerHTML = 'Título: '+r.data[i].titulo;
                            vistas.innerHTML = 'Vistas: '+r.data[i].vistas;
                            contenedor.appendChild(titulo);
                            contenedor.appendChild(vistas);
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
</body>
</html>