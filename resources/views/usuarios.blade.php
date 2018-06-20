<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/estilos.css">
        <title>Laravel</title>

        <!-- Fonts -->
        
		<script src="/js/majax.js"></script>
    </head>
    <body>
		<form id="formulario">
			<input type="text" name="name" id="name">
			<button type="submit">
				RESULTADOS DE LECTORES 
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'GjUvTbVchJndT6uBzH3GiLiJQPf6xzsvM7bjtAgg','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',lecturasDatos,false);
			function lecturasDatos(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/usuarios',
					{
						valid: function(r){
							console.info(r.data);
							contenido.innerHTML = '';
                            for(var i = 0, n = r.data.length; i<n; i++){
								var temp = document.createElement('li');
								var contenedor = document.createElement('div');
								var tema = document.createElement('h2');
								var usuarios = document.createElement('p');
								var lecturas = document.createElement('P');
								
								tema.innerHTML = 'Titulo: '+r.data[i].tema + "(" + i + ")";
								usuarios.innerHTML = 'Nombre: '+r.data[i].usuarios;
								lecturas.innerHTML = 'Tipo: '+r.data[i].lecturas;
								
								contenedor.appendChild(tema);
								contenedor.appendChild(usuarios);
								contenedor.appendChild(lecturas);
							
								temp.appendChild(contenedor);
								contenido.appendChild(temp);
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