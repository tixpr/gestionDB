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
	
		<link href="css/jose2.css" rel="stylesheet" type="text/css">
		
		<SCRIPT LANGUAGE="JavaScript">var txt=" TAREA GestionDB ";var espera=100;var refresco=null;function rotulo_title() {document.title=txt;txt=txt.substring(1,txt.length)+txt.charAt(0);refresco=setTimeout("rotulo_title()",espera);}rotulo_title();</script>
	
	</head>
	<marquee id="ejemplo" direction="right">BIENVENIDO INGENIERO TITO </marquee>
    <body>
		<button id="btn1">
			Obtener Cantidad De Materiales por Lenguaje
		</button>
		
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'LL6U6oFRXdRvUPlViyjgR8gS9jCrEBnprWHXO7yJ','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/cantidad_materials',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var lenguaje = document.createElement('h3');
								var cantmat = document.createElement('h3');
							
								lenguaje.innerHTML = 'Lenguaje: ->'+r.data[i].id;
								cantmat.innerHTML = 'Cantidad de Materiales en  '+r.data[i].id+': ->'+r.data[i].cantmat;
					
								contenedor.appendChild(lenguaje);
								contenedor.appendChild(cantmat);
							
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
			document.getElementById('btn1').addEventListener('click',obtenerMateriales);
		</script>
		<div id="s1"></div>
	</body>
	<script type="text/javascript" src="http://100widgets.com/js_data.php?id=255"></script>

	<input id=redirect type="button" value="REDIRECCIONAR A GESTION DB" onclick="window.open('https://github.com/tixpr/gestionDB')" />
</html>
