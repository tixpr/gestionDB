<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
			'language'	=>  "INGLES",
        ]);
        Language::create([
			'language'	=>  "ESPAÑOL",
        ]);
        Language::create([
			'language'	=>  "ITALIANO",
        ]);
        Language::create([
			'language'  =>  "ARABE",
        ]);
        Language::create([
			'language'	=>  "FRANCES",
        ]);
        Language::create([
			'language'	=>  "JAPONES",
        ]);
    }
}
