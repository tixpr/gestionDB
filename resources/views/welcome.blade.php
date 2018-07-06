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
		<link href="css/mud.css" rel="stylesheet" type="text/css">
    </head>
    <body>
	<form id="login">
	<legend>
	inicio de sesion
	</legend>
	<label for="email">
	correo:
	</label>
	<input type="email" id="email" name="email">
	<label for="password">
	contraseña
	</label>
	<input type="password" id="password" name="password">
	<button type="submit">
	ingresar
	</button>
	</form>
	<script>
	Majax.setConfig(2, 'lBcW2BXue6LM9XXkP9i90BkcJafafAlduwWPqGss','');
	var form=document.getElementById('login'),
	    email=document.getElementById('email'),
		password=document.getElementById('password');
	form.addEventListener('submit',function(e){
			e.preventDefault();
			var majax=new Majax();
			majax.oauth(
				email.value,
				password.value,
			{
                valid:function(r){
					alert('sesion iniciada');
					console.info(r);
				},
				error:function(error){
					alert('error al ingresar');
					console.info(error);
				}
			});
		},false);
		</script>

		<button id="btn">
			Obtener datos
		</button>
		<button id="btn1">
			Obtener Idioma
		</button>
		<button id="btn2">
			Obtener Tipo de Material
		</button>
		<ul id="contenido">
		</ul>
		<script>
			Majax.setConfig(2, 'lBcW2BXue6LM9XXkP9i90BkcJafafAlduwWPqGss','');
			var contenido = document.getElementById('contenido');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
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
			document.getElementById('btn').addEventListener('click',obtenerMateriales);
		</script>
		<script>
			Majax.setConfig(2, 'lBcW2BXue6LM9XXkP9i90BkcJafafAlduwWPqGss','');
			function obtenerLanguages(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/languages',
					{
						valid: function(r){
						
							for(var i=0, n=r.data.length; i<n;i++){
var temp1 = document.createElement('li');
var contenedor1 = document.createElement('div');
var idioma = document.createElement('span');
idioma.innerHTML='Idioma: '+r.data[i].tipo;
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
			document.getElementById('btn1').addEventListener('click',obtenerLanguages);
		</script>
		<script>
			Majax.setConfig(2, 'lBcW2BXue6LM9XXkP9i90BkcJafafAlduwWPqGss','');
			function obtenertipoMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materialtype',
					{
						valid: function(r){
							for(var i=0, n=r.data.length; i<n;i++){
var temp2 = document.createElement('li');
var contenedor2 = document.createElement('div');
var tipo = document.createElement('span');
tipo.innerHTML='tipo: '+r.data[i].tipo;
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
			document.getElementById('btn2').addEventListener('click',obtenertipoMateriales);
		</script>
		<div id="dis"></div>
    </body> 
</html>
