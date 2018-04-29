<?php

use Illuminate\Database\Seeder;

class BookcaseMaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=50;$i++) {
            DB::table('bookcase_materials')->insert([
                'bookcase_id' => rand(1,4),
                'material_id' => $i,
            ]);
        }
    }
}
