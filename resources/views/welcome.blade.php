<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="/js/majax.js"></script>
        <!--<link rel="stylesheet" href="/css/styles.css">-->
    </head>
    <body>
        <form id="login">
            <legend>
                Inicio de Sesion
            </legend>
            <label for="email">
                Correo:
            </label>
            <input type="email" id="email" name="email">
            <label for="password">
                Contraseña:
            </label>
            <input type="password" id="password" name="password">
            <button type="submit">
                Ingresar
            </button>
        </form>
        <script>
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            var form = document.getElementById('login'),
                email = document.getElementById('email'),
                password = document.getElementById('password');
            form.addEventListener('submit',function (e) {
                e.preventDefault();
                var majax = new Majax();
                majax.oauth(
                    email.value,
                    password.value,{
                        valid:function (r) {
                            alert('sesion iniciada');
                            console.info(r);
                        },
                        error:function (error) {
                            alert('error al ingresar');
                            console.info(error);
                        }
                    }
                );
            },false);
        </script>
        <br><br><br><br>
        <ul id="buttons">
            <a id="btn1"><p>MATERIAL</p></a>
            <a id="btn2"><p>IDIOMAS</p></a>
            <a id="btn3"><p>TIPO DE MATERIALES</p></a>
            <a id="btn4"><p>USUARIOS</p></a>
        </ul>
        <script>
            function obetenerMateriales(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materials',
                    {
                        valid:function (r) {
                            console.info(r);
                            document.getElementById('s1').innerHTML = null;
                            //ds1 =   document.getElementById('s1');
                            /*r.data.forEach(function (s) {
                                ds1.innerHTML = ds1.innerHTML +"<div class='tarjeta1'>"+"<h1 id='libros'>"+"Titulo: "+s.titulo+"</h1>"+"<h2>"+"Idioma: "+s.idioma+"</h2>"+"<h2>"+"Resumen: "+s.resumen+"</h2>"+"<h2>"+"Tipo : "+s.tipo+"</h2>"+"</div>";
                            });*/
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
                                contenido.appendChild(contenedor).setAttribute('class','tarjeta1');
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
            document.getElementById('btn1').addEventListener('click',obetenerMateriales);
        </script>
        <script>
            function obetenerIdioma(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/languages',
                    {
                        valid:function (r) {
                            document.getElementById('s1').innerHTML = null;
                            ds2 =   document.getElementById('s1');
                            r.data.forEach(function (s) {
                                ds2.innerHTML = ds2.innerHTML +"<div class='tarjeta2'>"+"<h1>"+s.id+"</h1>"+"<h2>"+s.idioma+"</h2>"+"</div>";
                            });
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn2').addEventListener('click',obetenerIdioma);
        </script>
        <script>
            function obetenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtypes',
                    {
                        valid:function (r) {
                            document.getElementById('s1').innerHTML = null;
                            ds3 =   document.getElementById('s1');
                            r.data.forEach(function (s) {
                                ds3.innerHTML = ds3.innerHTML +"<div class='tarjeta3'>"+"<h1>"+s.id+"</h1>"+"<h2>"+s.tipo+"</h2>"+"</div>";
                            });
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn3').addEventListener('click',obetenerTipoMaterial);
        </script>
        <script>
            function obetenerUsuario(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/user',
                    {
                        valid:function (r) {
                            document.getElementById('s1').innerHTML = null;
                            ds4 =   document.getElementById('s1');
                            r.data.forEach(function (s) {
                                ds4.innerHTML = ds4.innerHTML +"<div class='tarjeta4'>"+"<h1 id='usuarios'>"+s.nombre+"</h1>"+"<h2>"+s.email+"</h2>"+"</div>";
                            });
                        },
                        error: function(error){
                            console.error(error);
                        }
                    }
                );
            }
            document.getElementById('btn4').addEventListener('click',obetenerUsuario);
        </script>
        <section id="s1"></section>
    </body>
</html>