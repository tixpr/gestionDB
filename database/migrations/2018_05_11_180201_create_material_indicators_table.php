<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('material_indicators');
		



User::select(DB::raw('max(materials.year) as fecha,users.name,materials.title'))
->join('materials','users.id','=','materials.user_id')
->groupBy('users.id','materials.year','materials.title')
->get();
User::select(DB::raw('max(materials.id) as material_id,users.name,materials.title'))
->join('materials','users.id','=','materials.user_id')
->groupBy('users.id','materials.id','materials.title')->get(); 

MaterialType::select(DB::raw('count(materials.id) as Cantidad,material_types.type'))
->join('materials','materials.material_type_id','=','material_types.id')
->groupBy('material_types.type')->get();

MaterialType::select(DB::raw('max(materials.year) as Fecha,material_types.type'))
->join('materials','materials.material_type_id','=','material_types.id')
->groupBy('material_types.type')->get();

Bookcase::select(DB::raw('count(bookcase_materials.id) as Cantidad,bookcases.name'))
->join('bookcase_materials','bookcase_materials.bookcase_id','=','bookcases.id')
->groupBy('bookcases.id')->where('bookcases.user_id',34)->get();

Material::select(DB::raw('count(material_authors.id) as Cantidad_autores, materials.title'))
->join('material_authors','material_authors.material_id','=','materials.id')
->groupBy('materials.title')->get();

Material::select(DB::raw('count(user_view_materials.id) as Cantidad, materials.title'))
->join('user_view_materials','user_view_materials.material_id','=','materials.id')
->groupBy('materials.title')->get();

Material::select(DB::raw('count(user_view_materials.id) as Cantidad, materials.title'))
->join('user_view_materials','user_view_materials.material_id','=','materials.id')
->groupBy('materials.title')->where('materials.language_id',2)->get();

Role::select(DB::raw('count(user_roles.id) as Cantidad_usuarios, roles.name'))
->join('user_roles','user_roles.role_id','=','roles.id')
->groupBy('roles.name')->get();


























    }
}
