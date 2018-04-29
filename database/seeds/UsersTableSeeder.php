<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Juan',
            'Mely',
            'Maria',
            'Sol',
            'Lucho'
        ];
        $lastnames = [
            'Jack',
            'Pozo',
            'Sosa',
            'Meza',
            'Kanto'
        ];
        for($i=1;$i<=20;$i++) {
            DB::table('users')->insert([
                'name' => $lastnames[rand(0,4)]." ".$lastnames[rand(0,4)]." ".$names[rand(0,4)],
                'email' => "usuario0".$i.'@uncp.edu.pe',
                'password' => bcrypt('usuario'),
            ]);
        }
    }
}