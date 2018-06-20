<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/estilo.css" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>

    </head>
    <body>

         <h1 text-align: center>GESTIÓN BASE DE DATOS</h1>
         <h2> Ejercicio 15-06-18</h2>
		<form id="formulario">
            <input type="text" name="name" id="name">
            <button type="submit">
                CONSEGUIR EL TITULO, CANTIDAD DE VECES LEIDO
            </button>

        </form>
		<div id="contenido">
		</div>
		<script>
            var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'LL6U6oFRXdRvUPlViyjgR8gS9jCrEBnprWHXO7yJ','');
            var contenido = document.getElementById('contenido');
            formulario.addEventListener('submit',obtenertitulocantidadveces,false);
			function obtenertitulocantidadveces(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/userss',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var nombre = document.createElement('h1');
                                var titulo = document.createElement('p');
                                var leidas = document.createElement('span');
								nombre.innerHTML = 'MATERIAL-TITLE: ->'+r.data[i].nombre;
                                titulo.innerHTML = 'MATERIAL-TITLE: ->'+r.data[i].titulo;
                                leidas.innerHTML = 'CANTIDAD DE LEIDAS: ->'+r.data[i].leidas;
                                contenedor.appendChild(nombre);
								contenedor.appendChild(titulo);
								contenedor.appendChild(leidas);

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
</html