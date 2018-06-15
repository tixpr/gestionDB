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
		<link href="/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<button id="boton">
			Obtener DATOS MATERIALES
		</button>
		<button id="boton1">
			Obtener DATOS LENGUAJE
		</button>
		<button id="boton2">
			Obtener DATOS TIPO DE MATERIAL
		</button>
<<<<<<< HEAD
		<div id="contenido">
		<script>
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
=======
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			var contenido = document.getElementById('contenido');
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
<<<<<<< HEAD
							/*console.infor(r.data);
					
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "TITULO:  " + s.titulo + "  IDIOMA: " + s.idioma + "  TIPO: " + s.tipo +"</br>"+"</br>";
							});
							console.info(r.data);*/
							contenido.innerHTML='';
							for(var i=0, n=r.data.length;i<n; i++){
								var temp=document.createElement('div');
								var contenedor=document.createElement('div');
								var titulo=document.createElement('h4');
								var resumen=document.createElement('p');
								var tipo=document.createElement('span');
								var idioma=document.createElement('span');
								titulo.innerHTML='Titulo: '+r.data[i].titulo;
								resumen.innerHTML='Resumen: '+r.data[i].resumen;
								tipo.innerHTML='Tipo: '+r.data[i].tipo;
								idioma.innerHTML='Idioma: '+r.data[i].idioma;
=======
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
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
								contenedor.appendChild(titulo);
								contenedor.appendChild(resumen);
								contenedor.appendChild(tipo);
								contenedor.appendChild(idioma);
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
<<<<<<< HEAD



=======
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
							}
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('boton').addEventListener('click',obtenerMateriales);
		</script>

		<script>
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
			function obtenerDatosLenguajes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "IDIOMA: " + s.idioma + "</br>" + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('boton1').addEventListener('click',obtenerDatosLenguajes);
		</script>

		<script>
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
			function obtenerDatosTipoMaterial(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialtype',
					{
						valid: function(r){
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "TIPO:  " + s.tipo + "</br>" + "</br>";
							});
							console.info(r.data);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('boton2').addEventListener('click',obtenerDatosTipoMaterial);
		</script>
		<div id="s1"></div>
		</div>
    </body>
</html>
