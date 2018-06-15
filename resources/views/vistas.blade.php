<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
	
    </head>
    <body>
		<form id="formulario">
        <input type="number" name="user_id" id="user_id">
		<button type="submit">
        Obtener DATOS

        </button>
		
        </form>
        <ul id='contenido'>
        </ul>
		</div>
		<script>
         var formulario=document.getElementById('formulario');
			Majax.setConfig(2, 'GB9yf1QBKn5FrSl248gsmocb9XOv1KwoyILFjAru','');
            var contenido=document.getElementById('contenido')
            formulario.addEventListener('submit',obtenerDatosLenguajes,false)
			function obtenerDatosLenguajes(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/user_materials_view',
					{
						valid: function(r){

		
							/*console.infor(r.data);
					
							console.info(r);
							ds1 = document.getElementById('s1');
							r.data.forEach(function(s){
								ds1.innerHTML = ds1.innerHTML + "TITULO:  " + s.titulo + "  IDIOMA: " + s.idioma + "  TIPO: " + s.tipo +"</br>"+"</br>";
							});
							console.info(r.data);*/
                            console.info(r.data);
							contenido.innerHTML=  ' ';
						




						},
						error: function(error){
							console.error(error);
						}
					},
                    {
                        type : 'form',
                        data: formulario

                    }
                
                    
				);
			}
			
		</script>

    </body>
</html>
