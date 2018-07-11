<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
	private function getFullname()
	{
		$apellidos = ['QUISPE','FLORES','RODRIGUEZ','SANCHEZ','GARCIA','ROJAS','DIAZ','TORRES','LOPEZ','GONZALES','PEREZ','CHAVEZ','VASQUEZ','RAMOS','RAMIREZ','MENDOZA','ESPINOZA','CASTILLO','HUAMAN','VARGAS','MAMANI','FERNANDEZ','GUTIERREZ','RUIZ','CASTRO','ROMERO','SALAZAR','CRUZ','GOMEZ','RIVERA','MEDINA','LEON','PAREDES','SILVA','MARTINEZ','REYES','MORALES','CORDOVA','HERRERA','DELGADO','PALOMINO','AGUILAR','CARDENAS','DE LA CRUZ','RIOS','ALVARES','VEGA','CAMPOS','CALDERON','ALVARADO'];
		$nombres = ['MARIA','JOSE','JUAN','LUIS','CARLOS','ROSA','JORGE','VICTOR','ANA','LUZ','CESAR','CARMEN','MIGUEL','JULIO','JESUS','PEDRO','MANUEL','JUANA','SANTOS','SEGUNDO','JHON','DAVID','ANGEL','JULIA','DIEGO','FLOR','ELIZABETH','DANIEL','OSCAR','RUTH','DIANA','MARCO','EDWIN','JAVIER','WALTER','FRANCISCO','FERNANDO','MILAGROS','ALEJANDRO','RAUL','RICARDO','ALEX','ROBERTO','EDGAR','VICTORIA','EDUARDO','MARIO','JAIME','GLORIA','ANDREA'];
		$n = rand(1,3);
		$name = "";
		switch($n){
			case 1:{
				$name = $nombres[rand(0,49)];
			};break;
			case 2:{
				$name = $nombres[rand(0,49)]." ".$nombres[rand(0,49)];
			};break;
			case 3:{
				$name = $nombres[rand(0,49)]." ".$nombres[rand(0,49)]." ".$nombres[rand(0,49)];
			};break;
		}
		$fullname = $apellidos[rand(0,49)].' '.$apellidos[rand(0,49)].' '.$name;
		return $fullname;
	}
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//usuario administrador
		$user = User::create([
			'name'	    =>	$this->getFullname(),
			'email' 	=>	'admin@sistemasuncp.edu.pe',
			'password' 	=>	bcrypt('usuario')
		]);
		$user->roles()->attach(1);
		for($k=1;$k<=50;$k++){
			$material = $user->materials()->create([
				'title'=> str_random(30),
				'language_id'=> rand(1,6),
				'edition'=> rand(1,4),
				'year'=> rand(1998,2017),
				'material_type_id'=> rand(1,6),
				'file'=> str_random(10),
				'abstract'=> str_random(70),
				'isbn'=> str_random(13),
			]);
			$material->areas()->attach(rand(1,2));
			$material->areas()->attach(rand(3,4));
			$material->authors()->attach(rand(1,10));
			$material->authors()->attach(rand(11,20));
			$material->authors()->attach(rand(21,30));
		}
		//docentes
		for ($i=2; $i <= 5; $i++) {
			$user = User::create([
                'name'	    =>	$this->getFullname(),
                'email' 	=>	'usuario'.$i.'@sistemasuncp.edu.pe',
                'password' 	=>	bcrypt('usuario')
            ]);
			$user->roles()->attach(5);
			for($k=1;$k<=50;$k++){
				$material = $user->materials()->create([
					'title'=> str_random(30),
					'language_id'=> rand(1,6),
					'edition'=> rand(1,4),
					'year'=> rand(1998,2017),
					'material_type_id'=> rand(1,6),
					'file'=> str_random(10),
					'abstract'=> str_random(70),
					'isbn'=> str_random(13),
				]);
				$material->areas()->attach(rand(1,2));
				$material->areas()->attach(rand(3,4));
				$material->authors()->attach(rand(1,10));
				$material->authors()->attach(rand(11,20));
				$material->authors()->attach(rand(21,30));
			}
			for($l=1;$l<=10;$l++){
				$bookcase = $user->bookcases()->create([
					'name'	=>	str_random(10)
				]);
				for($j=1;$j<=10;$j++){
					$bookcase->materials()->attach(rand(1,50));
				}
			}
			for($v=1;$v<=30;$v++){
				$user->views()->attach(rand(1,50));
			}
		}
		//estudiantes
		for ($i=6; $i <= 505; $i++) {
			$user = User::create([
				'name'	    =>	$this->getFullname(),
				'email' 	=>	'usuario'.$i.'@sistemasuncp.edu.pe',
				'password' 	=>	bcrypt('usuario')
			]);
			$user->roles()->attach(2);
			for($k=1;$k<=10;$k++){
				$bookcase = $user->bookcases()->create([
					'name'	=>	str_random(10)
				]);
				for($j=1;$j<=20;$j++){
					$bookcase->materials()->attach(rand(1,250));
				}
			}
			for($v=1;$v<=100;$v++){
				$user->views()->attach(rand(1,250));
			}
		}
		
	}
}
