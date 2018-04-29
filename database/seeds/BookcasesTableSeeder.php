<?php

use Illuminate\Database\Seeder;

class BookcasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=4;$i++) {
            DB::table('bookcases')->insert([
                'name' => 'Librero '.$i,
                'user_id' => rand(1,20),
            ]);
        }
    }
}
