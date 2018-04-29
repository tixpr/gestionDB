<?php

use Illuminate\Database\Seeder;

class LanguajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languajes = [
            'Ingles',
            'Castellano',
            'Chino'
        ];

        for($i=0;$i<=2;$i++) {
            DB::table('languages')->insert([
                'language'=> $languajes[$i],
            ]);
        }
    }
}
