<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookcase extends Model
{
    /**
     * Tabla usada por el modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'bookcases';

    /**
     * Atributos asignables.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
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
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'bookcase_materials');
    }
}
