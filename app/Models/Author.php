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
    public function material()
    {
        return $this->belongsToMany(Role::class, 'material_authors');
    }
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
}
