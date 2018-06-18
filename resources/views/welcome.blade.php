 
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
    <div class="content" id="content">
       
            <button id="btn_Materials">
                Obtener  Datos Materials
            </button>
            <button id="btn_Languages">
                Obtener  Datos Languages
            </button>
            <button id="btn_MaterialTypes">
                Obtener  Datos TypeMaterial
            </button>
            <button id="btn_ObtenerMaterialPorIdioma">
                Obtener  Datos Material Por Idioma
            </button>
        
        
     </div>
     <div class="container_dialog">
        <dialog close class = "dialog" id = "dialog">
            <div class="contenido" id = "contenido">

            </div>
        </dialog>
     </div>
        <script>
        Majax.setConfig(2,'qMbXnApaA1BM7qCEmdWc9APqWh0OneDp7eyJFjgq','');
        // var contenido = document.queryselector('div#contenido')
        var contenido = document.getElementById('contenido');
        const modal = document.getElementById('dialog');
        function obtenerMaterialPorIdioma(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/MaterialPorIdioma',
                {
                    valid:function(r){
                        console.table(r.data);
                        contenido.innerHTML='';
                        
                           
                        for (var i = 0, n = r.data.length; i<n; i++) {
                            var temp = document.createElement('div');
                            var contenedor = document.createElement('div');
                            var id = document.createElement('span');
                            var idioma = document.createElement('span');
                            var cant_material = document.createElement('span');
                            id.innerHTML = '' + r.data[i].id;
                            idioma.innerHTML = ' Idioma ' + r.data[i].language+'</br>';
                            cant_material.innerHTML = 'Cantidad de Materiales ' + r.data[i].cant_material+'</br>';
                            contenedor.appendChild(id);
                            contenedor.appendChild(idioma);
                            contenedor.appendChild(cant_material);
                            temp.appendChild(contenedor);
                            contenido.appendChild(temp);
                            // '<dialog open>'+temp+'</dialog>'
                            
                        }
                        var button = document.createElement('button');
                        
                        button.innerHTML='Salir';
                        
                        button.id=('btn_salir');    
                        contenido.appendChild(button);
                        document.getElementById('btn_salir')
                        .addEventListener('click',()=>{dialog.removeAttribute('open')});
                        
                    }
                }
            )
        }
        document.getElementById('btn_ObtenerMaterialPorIdioma').addEventListener('click',obtenerMaterialPorIdioma);
        document.getElementById('btn_ObtenerMaterialPorIdioma')
        .addEventListener('click',()=>{dialog.setAttribute('open','true')});
        
        
    


        function obtenerMateriales(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materials',
                {
                    valid: function(r){
                        console.table(r.data);
                        contenido.innerHTML='';
                        for (var i = 0, n = r.data.length; i<n; i++) {
                            var temp = document.createElement('div');
                            var contenedor = document.createElement('div');
                            var titulo = document.createElement('h4');
                            var resumen = document.createElement('p');
                            var tipo = document.createElement('span');
                            var idioma = document.createElement('span');
                            titulo.innerHTML = 'Titulo: '+ r.data[i].titulo + "("+(i+1)+")";
                            resumen.innerHTML = 'Resumen: '+ r.data[i].resumen;
                            tipo.innerHTML = 'Tipo: '+ r.data[i].tipo;
                            idioma.innerHTML = 'Idioma: '+ r.data[i].idioma;
                            contenedor.appendChild(titulo);
                            contenedor.appendChild(resumen);
                            contenedor.appendChild(tipo);
                            contenedor.appendChild(idioma);
                            temp.appendChild(contenedor);
                            contenido.appendChild(temp);
                            
                            
                        }
                        var button = document.createElement('button');
                        button.innerHTML='Salir';                        
                        button.id=('btn_salir');    
                        contenido.appendChild(button);
                        document.getElementById('btn_salir')
                        .addEventListener('click',()=>{dialog.removeAttribute('open')});
                    
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );


            
        }
        document.getElementById('btn_Materials').addEventListener('click',obtenerMateriales);
        document.getElementById('btn_Materials')
        .addEventListener('click',()=>{dialog.setAttribute('open','true')});
        function obtenerLanguage(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/Languages',
                {
                    valid: function(r){
                        console.table(r);
                        contenido.innerHTML='';
                        for (var i = 0, n = r.data.length; i<n; i++) {
                            var temp = document.createElement('div');
                            var contenedor = document.createElement('div');
                            var language = document.createElement('h4');
                            language.innerHTML = 'Idioma '+(i+1)+' :'+ r.data[i];
                            contenedor.appendChild(language);
                            temp.appendChild(contenedor);
                            contenido.appendChild(temp);
                            
                        }
                        var button = document.createElement('button');
                        button.innerHTML='Salir';                        
                        button.id=('btn_salir');    
                        contenido.appendChild(button);
                        document.getElementById('btn_salir')
                        .addEventListener('click',()=>{dialog.removeAttribute('open')});
                    
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );

        }

        document.getElementById('btn_Languages').addEventListener('click',obtenerLanguage);
        document.getElementById('btn_Languages')
        .addEventListener('click',()=>{dialog.setAttribute('open','true')});


        function obtenerMaterialType(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/MaterialTypes',
                {
                    valid: function(r){
                        console.info(r);
                        contenido.innerHTML='';
                        for (var i = 0, n = r.data.length; i<n; i++) {
                            var temp = document.createElement('div');
                            var contenedor = document.createElement('div');
                            var type = document.createElement('h4');
                            type.innerHTML = 'Idioma '+(i+1)+' :'+ r.data[i];
                            contenedor.appendChild(type);
                            // contenedor.appendChild(language);
                            temp.appendChild(contenedor);
                            contenido.appendChild(temp);
                            
                        }
                        var button = document.createElement('button');
                        button.innerHTML='Salir';                        
                        button.id=('btn_salir');    
                        contenido.appendChild(button);
                        document.getElementById('btn_salir')
                        .addEventListener('click',()=>{dialog.removeAttribute('open')});
                        
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );
        }
        document.getElementById('btn_MaterialTypes').addEventListener('click',obtenerMaterialType);
        document.getElementById('btn_MaterialTypes')
        .addEventListener('click',()=>{dialog.setAttribute('open','true')});

        </script>
        
    </body>
</html>

