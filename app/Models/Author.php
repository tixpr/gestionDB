<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
     /**
     * Tabla usada por el modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'authors';

    /**
     * Atributos asignables.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'author',
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
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'material_authors');
    }
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'user_view_materials');
    }
}
