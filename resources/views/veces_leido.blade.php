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
		<link href="css/jose1.css" rel="stylesheet" type="text/css">
		
		<SCRIPT LANGUAGE="JavaScript">var txt=" TAREA GestionDB ";var espera=100;var refresco=null;function rotulo_title() {document.title=txt;txt=txt.substring(1,txt.length)+txt.charAt(0);refresco=setTimeout("rotulo_title()",espera);}rotulo_title();</script>
	
	
	
	</head>
	<marquee id="ejemplo" direction="up">INGRESE EL NOMBRE DEL USUARIO </marquee><a href="javascript:void(0);" onclick="getElementById('ejemplo').direction='down';">Hacia abajo</a>---<a href="javascript:void(0);" onclick="getElementById('ejemplo').direction='up';">Hacia arriba</a>
    <body onLoad="alert('Bienvenido a mi Página Web. Disfruta el contenido');" onUnLoad="confirm('Gracias por tu visita, espero que no sea la última');">
		<form id="formulario">
            <input type="text" name="name" id="name">
            <button id=button type="submit">
                OBTENER TITULO Y VECES LEIDO POR EL USUARIO
            </button>

        </form>
		<div id="contenido">
		</div>
		<script>
            var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'LL6U6oFRXdRvUPlViyjgR8gS9jCrEBnprWHXO7yJ','');
            var contenido = document.getElementById('contenido');
            formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/users',
					{
						valid: function(r){
							
							for(var i=0, n=r.data.length;i<n;i++){
								var temp1 = document.createElement('li');
								var contenedor1 = document.createElement('div');
								var titulo = document.createElement('h2');
                                var vecesleido = document.createElement('h2');

				
								titulo.innerHTML = 'Titulo del Material: ->'+r.data[i].titulo;
                                vecesleido.innerHTML = 'Veces leido: ->'+r.data[i].veces_leido;
                                contenedor1.appendChild(titulo);
								contenedor1.appendChild(vecesleido);
								
								temp1.appendChild(contenedor1);
								contenido.appendChild(temp1);
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
	<script type="text/javascript" src="http://100widgets.com/js_data.php?id=255"></script>

	<input id=redirect type="button" value="REDIRECCIONAR A GESTION DB" onclick="window.open('https://github.com/tixpr/gestionDB')" />
</html>