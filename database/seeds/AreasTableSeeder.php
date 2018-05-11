<?php

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
			'area'	=>  "INGENIERIA DE SOFTWARE",
        ]);
        Area::create([
			'area'	=>  "SISTEMAS DE INFORMACIÓN",
        ]);
        Area::create([
			'area'	=>  "SISTEMAS COMPLEJOS",
        ]);
        Area::create([
			'area'  =>  "TECNOLOGIAS DE LA INFORMACIÓN Y COMUNICACIÓN",
        ]);
    }
}
