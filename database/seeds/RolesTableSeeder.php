<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
			'name'	=>  "Administrador",
        ]);
        Role::create([
			'name'	=>  "Estudiante",
        ]);
        Role::create([
			'name'	=>  "Egresado",
        ]);
        Role::create([
			'name'  =>  "Administrativo",
        ]);
        Role::create([
			'name'	=>  "Docente",
        ]);
        Role::create([
			'name'	=>  "Directivo",
        ]);
    }
}
