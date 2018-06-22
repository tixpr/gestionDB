<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
        <link href="/css/estilos.css" rel="stylesheet" type="text/css"> 
        <script src="/js/majax.js"></script>
        
    </head>
    <body>
    <div id="contenedor">
        <button id="btn">
            Obtener  Datos Materials
        </button>
        <button id="btn1">
            Obtener  Datos Languages
        </button>
        <button id="btn2">
            Obtener  Datos TypeMaterial
        </button>
        <button id="btn3">
            Obtener  Idioma * Material
        </button>
        
     </div>
     <ul id="contenido">
     </ul>
        <script>
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        var contenido=document.getElementById('contenido');
        function obtenerMateriales(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materials',
                {
                    valid: function(r){
                        //console.info(r.data);
                        contenido.innerHTML='';
                        for(var i=0,n=r.data.length; i<n ; i++){
                           var temp=document.createElement('li');
                           var contenedor= document.createElement('div');
                           var titulo = document.createElement('h4');
                           var resumen=document.createElement('p');
                           var tipo=document.createElement('span');
                           var idioma=document.createElement('span');
                           var salto=document.createElement('br');
                           titulo.innerHTML='Titulo: '+r.data[i].titulo; 
                           resumen.innerHTML='Resumen: '+r.data[i].resumen;    
                           tipo.innerHTML='Tipo: '+r.data[i].tipo;    
                           idioma.innerHTML='Idioma: '+r.data[i].idioma;
                           contenedor.appendChild(titulo);
                           contenedor.appendChild(resumen); 
                           contenedor.appendChild(tipo); 
                           contenedor.appendChild(salto);
                           contenedor.appendChild(idioma); 
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
        <script>
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        function obtenerLenguajes(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/languages',
                {
                    valid: function(r){
                        contenido.innerHTML='';
                        for(var i=0,n=r.data.length; i<n ; i++){
                           var temp=document.createElement('li');
                           var contenedor= document.createElement('div');
                           var lenguaje = document.createElement('h4');  
                           lenguaje.innerHTML='Idioma: '+r.data[i].lenguaje;
                           contenedor.appendChild(lenguaje); 
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
        document.getElementById('btn1').addEventListener('click',obtenerLenguajes);
        </script>

        <script>
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        function obtenerMaterialType(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materialstype',
                {
                    valid: function(r){
                        contenido.innerHTML='';
                        for(var i=0,n=r.data.length; i<n ; i++){
                           var temp=document.createElement('li');
                           var contenedor= document.createElement('div');
                           var tipo = document.createElement('h4');  
                           tipo.innerHTML='Tipo: '+r.data[i].tipo;
                           contenedor.appendChild(tipo); 
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
        document.getElementById('btn2').addEventListener('click',obtenerMaterialType);
        </script>
    </body>
</html>
