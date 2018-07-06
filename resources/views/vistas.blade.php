@extends('base')
@section('contenido')
<form id="formulario">
            <input type="number" name="user_id" id="user_id">
            <button type="submit">
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
				majax.get(
					'/api/user_materials_view',
					{
						valid: function(r){
                            console.info(r.data);
                            for(var i=0, n=r.data.length;i<n;i++)
{
                            var temp = document.createElement('l1');
                            var contenedor = document.createElement('div');
                            var titulo = document.createElement('h4');
                            var vistas=document.createElement('v1')
                           
                            titulo.innerHTML='TITULO :' +r.data[i].titulo+"</br>";
                            vistas.innerHTML='VISTAS :' +r.data[i].vistas+"</br>";
                            
                            contenedor.appendChild(titulo);
                            contenedor.appendChild(vistas);
                           
                          
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
@endsection
