<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	<header>
				<h1>SERVICIOS</h1>
			</header>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="/js/majax.js"></script>
        <link href={{asset('css/estilos1.css')}} rel="stylesheet" type="text/css">
       

    </head>
    <body>
        <form id="formulario">
            <input type="text" name="name" id="name"
            >
            <button type="submit" ;>
                OBTENER
            </button>
        </form>
       <div id="contenido">
        </div>
        <script>
            var formulario=document.getElementById('formulario');
            Majax.setConfig(2, '6e2eIb6UuteHJMWmRKdUlvQbmE3WpWYUh86OFHck','');
            var contenido=document.getElementById('contenido');
            formulario.addEventListener('submit',obtenerDatos,false);
			function obtenerDatos(e){
				e.preventDefault();
				var majax = new Majax();
                var contenido =document.getElementById('contenido')
                
				majax.get(
					'/api/user_materials',
					{
						valid: function(r){
                            console.info(r.data);
                            for(var i=0, n=r.data.length;i<n;i++)
{
                            var temp = document.createElement('l1');
                            var contenedor = document.createElement('div');
                            
                            var titulo = document.createElement('span');
                            var cantidad = document.createElement('span');
                           
                          
                            titulo.innerHTML='TITULO :' +r.data[i].titulo+"</br>";
                            cantidad.innerHTML='CANTIDAD DE MATERIALES LEIDOS :' +r.data[i].cantidad_leida+"</br>";
                
                            contenedor.appendChild(titulo);
                            contenedor.appendChild(cantidad);

                            temp.appendChild(contenedor);
                            contenido.appendChild(temp);
}




						},
						error: function(error){
							console.error(error);
						}
                    },
                    {
                        type:'form',
                        data:formulario
                    }
				);
			}
        </script> 
    </body>
</html>
