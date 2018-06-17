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
		<form id="formulario">
            <input type="string" name="user_name" id="user_name">
            <button type="submit">
                Aguanttaaaa
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
								var titulo = document.createElement('h4');
                                var vecesleido = document.createElement('h4');

				
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
</html>