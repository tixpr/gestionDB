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
       <div id="contenido">
       <ul id="botones">
            <b id="btn1"><li>MATERIALES</li></b>
            <b id="btn2"><li>IDIOMAS</li></b>
            <b id="btn3"><li>TIPO DE MATERIALES</li></b>
            <b id="btn4"><li>USUARIOS</li></b>
            <b id="btn5" value="Actualizar pagina" onclick="window.location.reload()"><li>REFRESCAR</li></b>
        </ul>
        </div>
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
                            document.getElementById("m").innerHTML=JSON.stringify(r);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn1').addEventListener('click',obtenerMateriales);
        </script>
        <div id="m">
        </div>  
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerIdiomas(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
                            document.getElementById("i").innerHTML=JSON.stringify(r);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn2').addEventListener('click',obtenerIdiomas);
        </script>
        <div id="i">
        </div>  
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerTiposMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialTypes',
					{
						valid: function(r){
							console.info(r);
                            document.getElementById("t").innerHTML=JSON.stringify(r);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn3').addEventListener('click',obtenerTiposMateriales);
        </script>
        <div id="t">
        </div>  
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerUsuarios(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/users',
					{
						valid: function(r){
							console.info(r);
                            document.getElementById("u").innerHTML=JSON.stringify(r);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn4').addEventListener('click',obtenerUsuarios);
        </script>
        <div id="u">
        </div>
    </body>
</html>
