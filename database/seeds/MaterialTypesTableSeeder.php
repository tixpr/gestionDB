<?php

use Illuminate\Database\Seeder;
use App\Models\MaterialType;

class MaterialTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaterialType::create([
			'type'	=>  "LIBRO",
        ]);
        MaterialType::create([
			'type'	=>  "REVISTA",
        ]);
        MaterialType::create([
			'type'	=>  "ARTICULO",
        ]);
        MaterialType::create([
			'type'  =>  "TESIS",
        ]);
        MaterialType::create([
			'type'	=>  "PRACTICAS",
        ]);
        MaterialType::create([
			'type'	=>  "INFORME PROFESIONAL",
        ]);
    }
}
