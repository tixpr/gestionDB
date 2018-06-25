<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Servicios</title>

        <!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
		<link href="css/tarea2.css" rel="stylesheet" type="text/css">
		<center> <div class="n"><p>    <b><font color=GREEN face="georgia" size="6"><marquee width="600" scrollamount="8" bgcolor="#FFFFFF">CONSULTA TAREA NUMERO 2: SUBQUERIES</marquee>    </font></b></p><center>
		<marquee id="ejemplo" direction="up">PRESIONE OBTENER </marquee>
		<script type="text/javascript" src="http://100widgets.com/js_data.php?id=255"></script>
		<img border='0' src='//lh5.ggpht.com/_qgZA1ny_dAs/TM2UGNH7ORI/AAAAAAAAEuc/yRvKD_gAIg8/spiders.gif' style='position:fixed; top:0; left:0;'/>
		<p style="text-align: center;">    <iframe width="200" height="200" scrolling="no"
src="http://pagina-del-dia.euroresidentes.es/gadget-dia-de-hoy.php?fondo=Rojo.png&amp;texto=FFFFFF" frameborder="0"></iframe></p>
	</head>
	<input id='input'type="button" value="REDIRECCIONAR A GESTION DB" onclick="window.open('https://github.com/tixpr/gestionDB')" />
	<SCRIPT LANGUAGE="JavaScript">var txt=" TAREA GestionDB ";var espera=100;var refresco=null;function rotulo_title() {document.title=txt;txt=txt.substring(1,txt.length)+txt.charAt(0);refresco=setTimeout("rotulo_title()",espera);}rotulo_title();</script>   
	<body>
<form id="formulario">
			
			<button id='btn' type="submit">
				OBTENER MATERIALES POR ENCIMA DEL PROMEDIO DE LECTURAS
			</button>
		</form>
		<ul id="contenido">
		</ul>
		
		<script>
			
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'LL6U6oFRXdRvUPlViyjgR8gS9jCrEBnprWHXO7yJ','');

			var contenido = document.getElementById('contenido');
			
			formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/problema2',
					{
						valid: function(r){
							
							for(var i=0, n=r.data.length;i<n;i++){
								var temp1 = document.createElement('lo');
								var contenedor1 = document.createElement('div');
								var tipo = document.createElement('h3');
                                var vistas = document.createElement('h3');
                                var titulo = document.createElement('h3');
                                var area = document.createElement('h3');

								tipo.innerHTML = 'Tipo: ->'+r.data[i].tipo;
                                vistas.innerHTML = 'Vistas: ->'+r.data[i].cantidad_lecturas;
                                titulo.innerHTML = 'Titulo: ->'+r.data[i].titulo;
                                area.innerHTML = 'Area: ->'+r.data[i].area;
                             
                                contenedor1.appendChild(tipo);
								contenedor1.appendChild(vistas);
								contenedor1.appendChild(titulo);
								contenedor1.appendChild(area);
								temp1.appendChild(contenedor1);
								contenido.appendChild(temp1);
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