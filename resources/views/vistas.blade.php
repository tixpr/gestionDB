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
        <form id="formulario">
            <div class="select">
                <select name="user_id" id="user_id" >
                    @foreach($usuarios as $use)
                    <option value="{{$use->id}}" > {{$use->name}} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit">
                Obtener 
            </button>
        </form>
        <ul id="contenido">
        </ul>
        <script>
        var formulario=document.getElementById('formulario');
        var contenido=document.getElementById('contenido');
        Majax.setConfig(2,'XoGSUHl0etc7fFwFp5R2rEYslNQVnFXp5eWeuXsf','');
        formulario.addEventListener('submit',obtenerDatos,false);
        function obtenerDatos(e){
            e.preventDefault();//recarga página
            var majax= new Majax();
            majax.get(
                '/api/user_materials_view',
                {
                    valid: function(r){
                        console.info(r.data);
                        contenido.innerHTML='';
                        for(var i=0,n=r.data.length; i<n ; i++){
                           var temp=document.createElement('li');
                           var contenedor= document.createElement('div');
                           var tipo = document.createElement('h4'); 
                           var vista = document.createElement('h4');
                           tipo.innerHTML='TITULO: '+r.data[i].titulo;
                           vista.innerHTML='VISTAS: '+r.data[i].vistas;
                           contenedor.appendChild(tipo); 
                           contenedor.appendChild(vista);
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
                    data: formulario

                }

            );
            
        }
        </script>
     
        
    </body>
</html>
