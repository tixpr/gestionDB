<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="/js/majax.js"></script>
        <link href="css/disenio.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<button id="btn">
				Obtener Cantidad de Materiales por Idioma.
		</button>
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'j5P39w70XikKLtaVEPiJdEr3C1atcV0qzHM0mZ2A','');
			var contenido = document.getElementById('contenido');
			function obtenerIdiomasLenguaje(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languagematerialscant',
					{
						valid: function(r){
							console.info(r.data);
							contenido.innerHTML = '';
                            for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var idioma = document.createElement('h4');
								var cantidad = document.createElement('p');
								
								idioma.innerHTML = 'Titulo: '+r.data[i].Idioma;
								cantidad.innerHTML = 'Resumen: '+r.data[i].vistasidioma;
								
								contenedor.appendChild(idioma);
								contenedor.appendChild(cantidad);
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
                            }
                        },                      
						error: function(error){
							console.error(error);
						}
					}
				);
			}
            document.getElementById('btn').addEventListener('click',obtenerIdiomasLenguaje);
		</script>

    </body>
</html>
