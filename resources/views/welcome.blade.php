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
							for(var i=0, n=r.data.length; i<n; i++){
								var temp=document.createElement('lo');
								var contenedor=document.createElement('div');
								var titulo=document.createElement('h3');
								var idioma=document.createElement('p');
								var tipo=document.createElement('p');
								var resumen=document.createElement('p');
								titulo.innerHTML='Titulo:'+r.data[i].titulo;
								idioma.innerHTML='Idioma: '+r.data[i].idioma;
								tipo.innerHTML='Tipo: '+r.data[i].tipo;
								resumen.innerHTML='Resumen:'+r.data[i].resumen;
								contenedor.appendChild(titulo);
								contenedor.appendChild(idioma);
								contenedor.appendChild(tipo);
								contenedor.appendChild(resumen);
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
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerIdiomas(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
                            for(var i=0, n=r.data.length; i<n; i++){
								var temp1=document.createElement('lo');
								var contenedor1=document.createElement('div');
								var idioma=document.createElement('p');
								idioma.innerHTML='Idioma: '+r.data[i].idioma;
								contenedor1.appendChild(idioma);
								temp1.appendChild(contenedor1);
								contenido.appendChild(temp1);
							}
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn2').addEventListener('click',obtenerIdiomas);
        </script> 
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerTiposMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialTypes',
					{
						valid: function(r){
							for(var i=0, n=r.data.length; i<n; i++){
								var temp2=document.createElement('lo');
								var contenedor2=document.createElement('div');
								var tipo=document.createElement('p');
								tipo.innerHTML='Tipo: '+r.data[i].tipo;
								contenedor2.appendChild(tipo);
								temp2.appendChild(contenedor2);
								contenido.appendChild(temp2);
							}
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn3').addEventListener('click',obtenerTiposMateriales);
        </script>
        <script>
			Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
			function obtenerUsuarios(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/users',
					{
						valid: function(r){
							for(var i=0, n=r.data.length; i<n; i++){
								var temp3=document.createElement('lo');
								var contenedor3=document.createElement('div');
								var nombre=document.createElement('p');
								var correo=document.createElement('p');
								nombre.innerHTML='Nombre: '+r.data[i].nombre;
								correo.innerHTML='Correo: '+r.data[i].correo;
								contenedor3.appendChild(nombre);
								contenedor3.appendChild(correo);
								temp3.appendChild(contenedor3);
								contenido.appendChild(temp3);
							}
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn4').addEventListener('click',obtenerUsuarios);
        </script>
    </body>
</html>