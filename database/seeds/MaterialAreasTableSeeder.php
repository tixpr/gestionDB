<?php

use Illuminate\Database\Seeder;

class MaterialAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=50;$i++) {
            DB::table('material_areas')->insert([
                'area_id' => rand(1,5),
                'material_id' => $i,
            ]);
        }
    }
}
