<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Language extends Model
{
    /**
     * Tabla usada por el modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'languages';
    /**
     * Atributos asignables.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'language',
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
        return $this->hasMany(Material::class);
    }
}