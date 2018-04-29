<?php

use Illuminate\Database\Seeder;

class UserViewMaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=50;$i++) {
            DB::table('user_view_materials')->insert([
                'user_id' => rand(1,20),
                'material_id' => $i,
            ]);
        }
    }
}
