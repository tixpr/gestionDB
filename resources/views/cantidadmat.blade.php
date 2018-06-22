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
		<link href="css/222.css" rel="stylesheet" type="text/css">
    </head>
    <body>
	
		<button id="btn3">
			OBTENER NUMERO DE MATERIALES
		</button>
		
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'Pg6GIQYO4mZwtBojCcLzcpp1OBM6arKNeluPpIPP','');
			var contenido = document.getElementById('contenido');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/numero_materials',
					{
						valid: function(r){
							//console.info(r.data);
							contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var Lenguaje = document.createElement('h4');
								var cantidadmat = document.createElement('p');
								
								Lenguaje.innerHTML = 'Idioma: '+r.data[i].lenguaje;
								cantidadmat.innerHTML = 'Cantidad: '+r.data[i].cantidadmat;

								contenedor.appendChild(Lenguaje);
								contenedor.appendChild(cantidadmat);
								
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
			document.getElementById('btn3').addEventListener('click',obtenerMateriales);
		</script>
		<script>
    </body>
</html>
