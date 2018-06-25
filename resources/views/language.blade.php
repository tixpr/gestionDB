<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LARAVEL
        
        
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
        <link href={{asset('css/estilos1.css')}} rel="stylesheet" type="text/css">
    </head>
    <body>
   
            
            <button id="btn">
                OBTENER CANTIDAD DE MATERIALES POR IDIOMA
            </button>
       
            <div id="contenido">
        </div>
		<div id="dev">

		<script>
			Majax.setConfig(2, 'TlVHvggAEpYIFGvNLhSu7d0qw2SVHIoXTigN1mia','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
                var contenido =document.getElementById('contenido')
                
				majax.get(
					'/api/materials_por_language',
					{
						valid: function(r){
							console.info(r);
                            for(var i=0, n=r.data.length;i<n;i++)
{
                            var temp = document.createElement('l1');
                            var contenedor = document.createElement('div');
                            
                            var idioma = document.createElement('span');
                            var cantidad = document.createElement('span');
                           
                           
              
                            idioma.innerHTML='Idioma :' +r.data[i].IDIOMA+"</br>";
                            cantidad.innerHTML='Cantidad :' +r.data[i].CANTIDAD+"</br>";
                        
                          
                            contenedor.appendChild(idioma);
                            contenedor.appendChild(cantidad);

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
        </div>
    </body>
</html>
