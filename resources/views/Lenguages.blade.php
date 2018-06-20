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
        <link href="css/dise.css" rel="stylesheet" type="text/css"
    </head>
    <body>
		
			<button id="btn3">
			Resultados
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			var contenido = document.getElementById('contenido');
			function obtener(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/idiomamaterialsview',
					{
						valid: function(r){
                          //console.info(r.data);
							contenido.innerHTML = '';
							for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var idioma = document.createElement('h4');
								var cantidadmaterial = document.createElement('p');
							
							     idioma.innerHTML = 'Idioma: '+r.data[i].idioma;
								cantidadmaterial.innerHTML = 'Resultados: '+r.data[i].resultados;
							
								contenedor.appendChild(idioma);
                                contenedor.appendChild(cantidadmaterial);
                                
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
            document.getElementById('btn3').addEventListener('click',obtener);
		</script>
    </body>
</html>
