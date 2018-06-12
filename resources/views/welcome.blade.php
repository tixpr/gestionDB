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
		<!-- Metas -->
		<Meta charset="utf-8">
		<meta name="viewport" content="width=device-witch, user-scalable=no, initial-scale=1.0, maximun-scale=1.0">
    </head>
    <body>
		<!-- portada -->
		<div class="cover">
			<div class=logo>
				<figure class="logo">
					<img scr="imagenes/logo1.jpg" alt="logo">
				</figure>
				<button id="btn">
					obtener materiales
				</button>
				<h1>TAREA DE GESTION </h1>
			</div>
		</div>
		<!-- bienvenida -->
		<section class="info">
		<h2>BIENVENIDO</h2>
		<div class="infocontent">

			<article class="block">
				<i class="icono btn1"></i>
				<h3>OBTENER MATERIALES </h3>
				<P>obtencion de los materiales de los usuarios</p>
			<a href="#", class="btn">ver</a>
			</article>
		<a href="", class="icon GBD"></a>
		<article class="block">
				<i class="icono btn1"></i>
				<h3>OBTENER MATERIALES </h3>
				<P>obtencion de los materiales de los usuarios</p>
			<a href="#", class="btn">ver</a>
			</article>
			<article class="block">
				<i class="icono btn1"></i>
				<h3>OBTENER MATERIALES </h3>
				<P>obtencion de los materiales de los usuarios</p>
			<a href="#", class="btn">ver</a>
			</article>
	</div>	
	</section>
		<div id="contenido">
		</div>
		<script>
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn').addEventListener('click',obtenerMateriales);
		</script>
    </body>
</html>
