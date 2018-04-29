<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $digital = [
            true,
            false
        ];
        for($i=1;$i<=50;$i++) {
            DB::table('materials')->insert([
                'title' => 'Material Nro 0'.$i,
                'language_id' => rand(1,3),
                'edition' => rand(1,5),
                'year' => rand(1990,2020),
                'material_type_id' => rand(1,3),
                'file' => str_random(20),
                'abstract' => str_random(50),
                'isbn' => 'Cod. '.$i,
                'is_digital' => $digital[rand(0,1)],
                'user_id' => rand(1,20),
            ]);
        }
    }
}
