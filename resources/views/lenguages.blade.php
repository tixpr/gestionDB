<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/estilos.css">
        <title>Laravel</title>

        <!-- Fonts -->
        
		<script src="/js/majax.js"></script>
    </head>
    <body>
		<form id="formulario">
			<button id=btn>
				CANTIDAD DE MATERIALES POR IDIOMA
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'GjUvTbVchJndT6uBzH3GiLiJQPf6xzsvM7bjtAgg','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languagematerialsview',
					{
						valid: function(r){
							contenido.innerHTMLk = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var Idioma = document.createElement('h4');
								var libros = document.createElement('p');
								
								
								Idioma.innerHTML = 'Idioma: '+r.data[i].Idioma + "(" + i + ")";
								libros.innerHTML = 'Cantidad_Leidos: '+r.data[i].libros;
								
								
								contenedor.appendChild(Idioma);
								contenedor.appendChild(libros);
							
							
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
							}
						},
						error: function(error){
							console.error(error);
						}
					},

				);
			}
		</script>
    </body>
</html>
