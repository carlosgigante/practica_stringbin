<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorium
 *
 * @property $id_categoria
 * @property $nombre_categoria
 * @property $created_at
 * @property $updated_at
 *
 * @property Transaccion[] $transaccions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categorium extends Model
{
    
    static $rules = [
		'id_categoria' => 'required',
		'nombre_categoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_categoria','nombre_categoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaccions()
    {
        return $this->hasMany('App\Models\Transaccion', 'id_categoria', 'id_categoria');
    }
    

}
