<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	<header>
		<h1><marquee behavior="alternate">SERVICIO DE CONSULTA</marquee>
	</header>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="/js/majax.js"></script>
        <link rel="stylesheet" href="/css/styles.css">

    </head>
    <body>
		<form id="formulario">
            <input type="search" name="user_name" placeholder="Buscar Nombres..." size="30">
            <button type="submit">
                OBTENER LECTURAS
            </button>

        </form>
		<div id="contenido">
		</div>
		<script>
            var formulario = document.getElementById('formulario');
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
            var contenido = document.getElementById('contenido');
            formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/users_material',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('lo');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h3');
                                var lecturas = document.createElement('h3');

								titulo.innerHTML = 'Titulo del Material: ->'+r.data[i].titulo;
                                lecturas.innerHTML = 'Veces leido: ->'+r.data[i].lecturas_totales;
                                contenedor.appendChild(titulo);
								contenedor.appendChild(lecturas);
								
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
							}},
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