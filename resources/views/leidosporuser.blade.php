 
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TAREA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css"> 
        <script src="/js/majax.js"></script>
        
    </head>
    <body>
    <!-- <div class="content" id="content">
       
            <button id="btn_Materials">
                Obtener  Datos Materials
            </button>
            <button id="btn_Languages">
                Obtener  Datos Languages
            </button>
            <button id="btn_MaterialTypes">
                Obtener  Datos TypeMaterial
            </button>
        
        
     </div> -->
     <form action="" id = "formulario">
        <input type="text" name="name" id="name">
        <button type="submit" id = "btnObtener">Obtener</button>
     
     </form>
         
     </div>
     <div class="container_dialog">
        <dialog close class = "dialog" id = "dialog">
            <div class="contenido" id = "contenido">

            </div>
        </dialog>
     </div>
        <script>
        var formulario = document.getElementById('formulario');
        Majax.setConfig(2,'qMbXnApaA1BM7qCEmdWc9APqWh0OneDp7eyJFjgq','');
        // var contenido = document.queryselector('div#contenido')
        var contenido = document.getElementById('contenido');
        const modal = document.getElementById('dialog');
        var button = document.createElement('button');
        button.innerHTML='Cerrar';                        
        button.id=('btn_salir');    
        dialog.appendChild(button);
        document.getElementById('btn_salir')
        .addEventListener('click',()=>{dialog.removeAttribute('open')});
        formulario.addEventListener('submit',obtenerDatos,true);

        function obtenerDatos(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materialsReadUser',
                {
                    valid: function(r){
                        
                        console.table(r.data);
                        contenido.innerHTML='';
                        for (var i = 0, n = r.data.length; i<n; i++) {
                            var temp = document.createElement('div');
                            var contenedor = document.createElement('div');
                            var nombre = document.createElement('h4');
                            var titulo = document.createElement('h4');
                            var cantidad = document.createElement('h4');
                            nombre.innerHTML = 'Nombre: '+ r.data[i].nombre;
                            titulo.innerHTML = 'Titulo: '+ r.data[i].titulo;
                            cantidad.innerHTML = 'Cantidad Leida: '+ r.data[i].cantidadleida;
                            contenedor.appendChild(nombre);
                            contenedor.appendChild(titulo);
                            contenedor.appendChild(cantidad);
                            temp.appendChild(contenedor);
                            contenido.appendChild(temp);
                            
                        }
                       
        document.getElementById('btnObtener')
        .addEventListener('click',()=>{dialog.setAttribute('open','true')});
                        
                    },
                    error: function(error){
                        console.info(error);
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
