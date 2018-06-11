<?php

namespace App\Models;
<<<<<<< HEAD
=======

>>>>>>> dev
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
<<<<<<< HEAD
    use  HasApiTokens, Notifiable;
=======
    use HasApiTokens, Notifiable;
>>>>>>> dev

    /**
     * Tabla usada por el modelo en la base de datos.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Atributos asignables.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password'
    ];
    /**
     * Si en modelo existe los timestamps created_at y updated_at.
     *
     * @var boolean
     */
    public $timestamps = true;
    /**
     * Atributos excluidos del modelo al transformarlo en JSON.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'remember_token'
    ];
    public function roles()
	{
		return $this->belongsToMany(Role::class, 'user_roles');
    }
    public function bookcases()
    {
        return $this->hasMany(Bookcase::class);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function views()
    {
        return $this->belongsToMany(Material::class, 'user_view_materials');
    }
}
