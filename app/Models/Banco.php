<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banco
 *
 * @property $id_banco
 * @property $nombre_banco
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuentabanco[] $cuentabancos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Banco extends Model
{
    
    static $rules = [
		'id_banco' => 'required',
		'nombre_banco' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_banco','nombre_banco'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentabancos()
    {
        return $this->hasMany('App\Models\Cuentabanco', 'id_banco', 'id_banco');
    }
    

}
