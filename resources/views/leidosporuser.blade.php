@extends('base')
@section('contenido')
<form action="" id = "formulario">
        <label class="labelName" for="name">Inserte el nombre completo del usuario</label>
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
        @endsection

