<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * Tabla usada por el modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'materials';

    /**
     * Atributos asignables.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'language_id',
        'edition',
        'year',
        'material_type',
        'file',
        'abstract',
        'isbn',
        'is_digital',
        'user_id'
    ];
    /**
     * Si en modelo existe los timestamps created_at y updated_at.
     *
     * @var boolean
     */
    public $timestamps = false;
    /**
     * Atributos excluidos del modelo al transformarlo en JSON.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];
    public function authors()
	{
		return $this->belongsToMany(Author::class, 'material_authors');
    }
    public function areas()
    {
        return $this->belongsToMany(Area::class,'material_areas');
    }
    public function view()
    {
        return $this->belongsToMany(View::class,'user_view_materials');
    }
    public function bookcase()
    {
        return $this->belongsToMany(View::class,'bookcase_materials');
    }

    public function languages()
    {
        return $this->hasMany(Language::class);
    }
    public function material_types()
    {
        return $this->hasMany(Material_type::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }





}
