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
		<link href="css/jose.css" rel="stylesheet" type="text/css">

    </head>
    <body>
	<form id="login">
	    <legend>
		   Inicio de Sesion
		   </legend>
		   <label for="email">
		   Correo:
		   </label>
		   <input type="email" id="email" name="email">
		   <label for="password">
		   Contraseña:
		   </label>
		   <input type="password" id="password" name="password">
		   <button type="submit">
	       Ingresar
		   </button>
		   </form>
		   <script>
		   Majax.setConfig(4 , 'MEHYRLgbIGtUGEgtN6mxxPCxqU2zTZmPgPykY2yv','');
		   var form = document.getElementById('login'),
		       email = document.getElementById('email'),
			   password = document.getElementById('password');
			  form.addEventListener('submit',function(e){
				  e.preventDefault();
				  var majax = new Majax();
				  majax.oauth(email.value,
				              password.value,
							  {
								  valid: function(r){
									  alert('Sesión iniciada');
									  console.info(r);
								  },
								  error: function(error){
									  alert('Error al ingresar');
									  console.info(error);
								  }
							  });
			  },false);
			  </script>
	 
		<button id="btn1">  
			Obtener Datos Materiales
		</button>
		<button id="btn2">
			Obtener Datos de Lenguaje
		</button>
		<button id="btn3">
			Obtener Datos de Tipo de Material
		</button>
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(4 , 'MEHYRLgbIGtUGEgtN6mxxPCxqU2zTZmPgPykY2yv','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var titulo = document.createElement('h4');
								var resumen = document.createElement('p');
								var tipo = document.createElement('span');
								var idioma = document.createElement('span');
								titulo.innerHTML = 'Titulo: ->'+r.data[i].titulo;
								resumen.innerHTML = 'Resumen: ->'+r.data[i].resumen;
								tipo.innerHTML = 'Tipo: ->'+r.data[i].tipo;
								idioma.innerHTML = 'Idioma: ->'+r.data[i].idioma;
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
			document.getElementById('btn1').addEventListener('click',obtenerMateriales);
		</script>

		<script>
			Majax.setConfig(4 , 'MEHYRLgbIGtUGEgtN6mxxPCxqU2zTZmPgPykY2yv','');
			function obtenerLenguaje(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
							
							for(var i=0, n=r.data.length;i<n;i++){
								var temp1 = document.createElement('li');
								var contenedor1 = document.createElement('div');
								var idioma = document.createElement('h4');
								
								idioma.innerHTML = 'Idioma: ->'+r.data[i].id;
							
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
			document.getElementById('btn2').addEventListener('click',obtenerLenguaje);
		</script>

		<script>
			Majax.setConfig(4 , 'MEHYRLgbIGtUGEgtN6mxxPCxqU2zTZmPgPykY2yv','');
			function obtenerMaterialType(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialTypes',
					{
						valid: function(r){
							for(var i=0, n=r.data.length;i<n;i++){
								var temp2 = document.createElement('li');
								var contenedor2 = document.createElement('div');
								var tippo = document.createElement('h4');
								
								tippo.innerHTML = 'Tipo: ->'+r.data[i].tipo;
							
								contenedor2.appendChild(tippo);
								
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
			document.getElementById('btn3').addEventListener('click',obtenerMaterialType);
		</script>
		<div id="s1"></div>
    </body>
</html>
