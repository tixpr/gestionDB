<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="/js/majax.js"></script>
    </head>
    <body>
		<button id="btn"style="background:lightgreen">
			 MATERIALES
		</button>
		
		
		<script>
			Majax.setConfig(2, 'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
			function obtenerMateriales(e){
				e.preventDefault();
				var majax = new Majax();
				majax.get(
					'/api/materials',
					{
						valid: function(r){
							console.info(r);
						},
						error: function(error){
							console.error(error);
						}
					}
				);
			}
			document.getElementById('btn').addEventListener('click',obtenerMateriales);
		</script>
		<button id="btn1"style="background:yellow">
             IDIOMAS
        </button>
		 <script>
        Majax.setConfig(2,'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
        function obtenerIdiomas(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/languages',
                {
                    valid: function(r){
                        console.info(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );

        }
        document.getElementById('btn1').addEventListener('click',obtenerIdiomas);
        </script>
<button id="btn2"style="background:orange">
            TIPO DE MATERIAL
        </button>
        <script>
        Majax.setConfig(2,'iAgq88GUeVhyia0ije1q9bXAsRIZP8PbPDHupWsD','');
        function obtenerTipodeMateriales(e){
            e.preventDefault();
            var majax= new Majax();
            majax.get(
                '/api/materialstype',
                {
                    valid: function(r){
                        console.info(r);
                    },
                    error: function(error){
                        console.error(error);
                    }
                }

            );
        }
        document.getElementById('btn2').addEventListener('click',obtenerTipodeMateriales);
        </script>
    </body>
</html>
