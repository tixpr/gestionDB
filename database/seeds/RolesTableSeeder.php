<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Administrador',
            'Docente',
            'Alumno',
            'Invitado'
        ];
        for($i=0;$i<=3;$i++) {
            DB::table('roles')->insert([
                'name' => $roles[$i],
            ]);
        }
    }
}