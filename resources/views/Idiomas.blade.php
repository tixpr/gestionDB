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
    </head>
    <body>
		<form id="formulario">
			<input type="number" name="language_id" id="language_id">
			<button type="submit">
				consultar
			</button>
		</form>
		<ul id="contenido">
		</ul>
		<script>
			var formulario = document.getElementById('formulario');
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
			var contenido = document.getElementById('contenido');
			formulario.addEventListener('submit',obtenerIdiomamAter,false);
			function obtenerIdiomamAter(e){
				e.preventDefault();
				var majax = new Majax();
                

				majax.get(
					'/api/lang_materials_view',
					{
						valid: function(r){
							console.info(r.data);
                           contenido.innerHTMLk = '';
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
