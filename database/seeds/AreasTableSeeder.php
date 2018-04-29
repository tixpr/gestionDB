<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            'Comunicacion',
            'Arte',
            'Quimica',
            'Fisica',
            'Matematica'
        ];
        for($i=0;$i<=4;$i++) {
            DB::table('areas')->insert([
                'area' => $areas[$i],
            ]);
        }
    }
}
