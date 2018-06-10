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
        <section id="buttons">
            <button id="btn1">
                Obtener Material
            </button>
            <button id="btn2">
                Obtener Idiomas
            </button>
            <button id="btn3">
                Obtener Tipo Material
            </button>
            <button id="btn4">
                Usuarios
            </button>
        </section>
        <script>
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obetenerMateriales(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materials',
                    {
                        valid:function (r) {
                            document.getElementById('s1').style.display = 'flex';
                            document.getElementById('s2').style.display = 'none';
                            document.getElementById('s3').style.display = 'none';
                            document.getElementById('s4').style.display = 'none';
                            //document.getElementsByClassName('tarjeta').style.border='1px solid green';
                            ds1 =   document.getElementById('s1');
                            r.data.forEach(function (s) {
                                ds1.innerHTML = ds1.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.titulo+"</h1>"+"<h2>"+s.idioma+"</h2>"+"<h2>"+s.resumen+"</h2>"+"</div>";
                            });
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
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obetenerIdioma(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/languages',
                    {
                        valid:function (r) {
                            document.getElementById('s1').style.display = 'none';
                            document.getElementById('s2').style.display = 'flex';
                            document.getElementById('s3').style.display = 'none';
                            document.getElementById('s4').style.display = 'none';
                            //document.getElementsByClassName('tarjeta').style.border='1px solid blue';
                            ds2 =   document.getElementById('s2');
                            r.data.forEach(function (s) {
                                ds2.innerHTML = ds2.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.id+"</h1>"+"<h2>"+s.idioma+"</h2>"+"</div>";
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
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obetenerTipoMaterial(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/materialtypes',
                    {
                        valid:function (r) {
                            document.getElementById('s1').style.display = 'none';
                            document.getElementById('s2').style.display = 'none';
                            document.getElementById('s3').style.display = 'flex';
                            document.getElementById('s4').style.display = 'none';
                            //document.getElementsByClassName('tarjeta').style.border='1px solid red';
                            ds3 =   document.getElementById('s3');
                            r.data.forEach(function (s) {
                                ds3.innerHTML = ds3.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.id+"</h1>"+"<h2>"+s.tipo+"</h2>"+"</div>";
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
            Majax.setConfig(2,'v6SYRt3gvXVj5wPW7gGLOmdlBF2fi6I0fmNFT9J8','');
            function obetenerUsuario(e) {
                e.preventDefault();
                var majax= new Majax();
                majax.get(
                    '/api/user',
                    {
                        valid:function (r) {
                            document.getElementById('s1').style.display = 'none';
                            document.getElementById('s2').style.display = 'none';
                            document.getElementById('s3').style.display = 'none';
                            document.getElementById('s4').style.display = 'flex';
                            //document.getElementsByClassName('tarjeta').style.border='1px solid darkviolet';
                            ds4 =   document.getElementById('s4');
                            r.data.forEach(function (s) {
                                ds4.innerHTML = ds4.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.nombre+"</h1>"+"<h2>"+s.email+"</h2>"+"</div>";
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
        <section id="s2"></section>
        <section id="s3"></section>
        <section id="s4"></section>
    </body>
</html>
