<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="/js/majax.js"></script>
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <ul id="botones">
            <a id="botona"><p>MATERIAL</p></a>
            <a id="botonb"><p>IDIOMAS</p></a>
            <a id="botonc"><p>TIPO DE MATERIALES</p></a>
        </ul>
        <script>
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obetenerMateriales(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materials',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('s1').innerHTML = null;
                            var contenido = document.getElementById('s1');
                            for (var i=0,n=r.data.length;i<n;i++){
                                var contenedor = document.createElement('div');
                                var titulo = document.createElement('h1');
                                var resumen = document.createElement('h2');
                                var tipo = document.createElement('h2');
                                var idioma = document.createElement('h2');
                                titulo.innerHTML = 'Titulo: '+ r.data[i].titulo+"("+i+")";
                                resumen.innerHTML = 'Resumen : '+ r.data[i].resumen;
                                tipo.innerHTML = 'Tipo : '+ r.data[i].tipo;
                                idioma.innerHTML = 'Idioma: '+ r.data[i].idioma;
                                contenido.appendChild(contenedor);
                                contenedor.appendChild(titulo);
                                contenedor.appendChild(resumen);
                                contenedor.appendChild(tipo);
                                contenedor.appendChild(idioma);

                            }
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('botona').addEventListener('click',obetenerMateriales);
        </script>
        <script>
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obtenerIdioma(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/languages',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('mostrar2').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('botonb').addEventListener('click',obtenerIdioma);
        </script>
        <script>
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obtenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtypes',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('mostrar3').innerHTML=JSON.stringify(r);
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('botonc').addEventListener('click',obtenerTipoMaterial);
        </script>

        <section id="s1"></section>
        <section id="mostrar2"></section>
        <section id="mostrar3"></section>
    </body>
</html>