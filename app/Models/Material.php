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
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function views()
    {
        return $this->belongsToMany(Material::class,'user_view_materials');
    }
    public function language()
    {
        return $this->belongsTo(Language::class,'language_id');
    }
    public function material_type()
    {
        return $this->belongsTo(MaterialType::class,'material_type_id');
    }
    public function bookcases()
    {
        return $this->belongsToMany(Bookcase::class,'bookcase_materials');
    }
}
