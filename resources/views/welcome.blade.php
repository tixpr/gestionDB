<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	<header>
		<h1><marquee behavior="alternate">SERVICIO DE CONSULTA	</marquee>
	</header>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="/js/majax.js"></script>
        <link rel="stylesheet" href="/css/styles.css">

    </head>
    <body>
        <ul id="buttons">
            <a id="btn1"><p>MATERIAL</p></a>
            <a id="btn2"><p>IDIOMAS</p></a>
            <a id="btn3"><p>TIPO DE MATERIALES</p></a>
            <a id="btn4"><p>USUARIOS</p></a>
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
                            // Esta Parte del Codigo es para que se oculten los otros cuando uses el Boton
                            document.getElementById('s1').style.display = 'flex';
                            document.getElementById('s2').style.display = 'none';
                            document.getElementById('s3').style.display = 'none';
                            document.getElementById('s4').style.display = 'none';
                            //document.getElementsByClassName('tarjeta').style.border='1px solid green';
                            //Esta parte es para imprimir en el HTML
                            ds1 =   document.getElementById('s1');
                            r.data.forEach(function (s) {
                                ds1.innerHTML = ds1.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.titulo+"</h1>"+"<h2>"+s.idioma+"</h2>"+"<h3>"+s.tipo+"</h3>"+"<h4>"+s.resumen+"</h4>"+"</div>";
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
                                ds2.innerHTML = ds2.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.idioma+"</h1>"+"</div>";
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
                    '/api/materialTypes',
                    {
                        valid:function (r) {
                            document.getElementById('s1').style.display = 'none';
                            document.getElementById('s2').style.display = 'none';
                            document.getElementById('s3').style.display = 'flex';
                            document.getElementById('s4').style.display = 'none';
                            //document.getElementsByClassName('tarjeta').style.border='1px solid red';
                            ds3 =   document.getElementById('s3');
                            r.data.forEach(function (s) {
                                ds3.innerHTML = ds3.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.tipo+"</h1>"+"</div>";
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
                    '/api/users',
                    {
                        valid:function (r) {
                            document.getElementById('s1').style.display = 'none';
                            document.getElementById('s2').style.display = 'none';
                            document.getElementById('s3').style.display = 'none';
                            document.getElementById('s4').style.display = 'flex';
                            ds4 =   document.getElementById('s4');
                            r.data.forEach(function (s) {
                                ds4.innerHTML = ds4.innerHTML +"<div class='tarjeta'>"+"<h1>"+s.nombre+"</h1>"+"<h2>"+s.correo+"</h2>"+"</div>";
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
