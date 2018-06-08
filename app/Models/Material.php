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
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function authors()
	{
		return $this->belongsToMany(Author::class, 'material_authors');
    }
    public function areas()
    {
        return $this->belongsToMany(Area::class,'material_areas');
<<<<<<< HEAD
    }
    public function languages()
    {
        return $this->belongsTo(Language::class);
    }
    public function material_types()
    {
        return $this->belongsTo(MaterialType::class);
    }
=======
	}
	public function language()
	{
		return $this->belongsTo(Language::class,'language_id');
	}
	public function material_type()
	{
		return $this->belongsTo(MaterialType::class,'material_type_id');
	}
>>>>>>> a4926945f5724a2d953b1102ca2b1b60345b8f95
}
