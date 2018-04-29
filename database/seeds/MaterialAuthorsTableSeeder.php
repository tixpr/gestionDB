<?php

use Illuminate\Database\Seeder;

class MaterialAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=50;$i++) {
            DB::table('material_authors')->insert([
                'material_id' => $i,
                'author_id' => rand(1,10),
            ]);
        }
    }
}
