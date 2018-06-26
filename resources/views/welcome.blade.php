
@section('content')
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>

    </head>
    <body>
		<button id="btn">
			Obtener datos
		</button>
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'j5P39w70XikKLtaVEPiJdEr3C1atcV0qzHM0mZ2A','');
			var contenido = document.getElementById('contenido');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							//console.info(r.data);
							contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h4');
								var resumen = document.createElement('p');
								var tipo = document.createElement('span');
								var idioma = document.createElement('span');
								titulo.innerHTML = 'Titulo: '+r.data[i].titulo + "(" + i + ")";
								resumen.innerHTML = 'Resumen: '+r.data[i].resumen;
								tipo.innerHTML = 'Tipo: '+r.data[i].tipo;
								idioma.innerHTML = 'Idioma: '+r.data[i].idioma;
								contenedor.appendChild(titulo);
								contenedor.appendChild(resumen);
								contenedor.appendChild(tipo);
								contenedor.appendChild(idioma);
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
			document.getElementById('btn').addEventListener('click',obtenerMateriales);
		</script>
    </body>
</html>''