<?php

use Illuminate\Database\Seeder;

class MaterialTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Libro',
            'Revistas',
            'Tesis'
        ];
        for($i=0;$i<=2;$i++) {
            DB::table('material_types')->insert([
                'type' => $types[$i],
            ]);
        }
    }
}
