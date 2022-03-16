<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccion
 *
 * @property $id
 * @property $id_cuenta
 * @property $id_categoria
 * @property $monto
 * @property $fecha
 * @property $tipo_transaccion
 * @property $nota
 * @property $created_at
 * @property $updated_at
 *
 * @property Categorium $categorium
 * @property Cuentabanco $cuentabanco
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaccion extends Model
{
    
    static $rules = [
		'id' => 'required',
		'id_cuenta' => 'required',
		'id_categoria' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'tipo_transaccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_cuenta','id_categoria','monto','fecha','tipo_transaccion','nota'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorium()
    {
        return $this->hasOne('App\Models\Categorium', 'id_categoria', 'id_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuentabanco()
    {
        return $this->hasOne('App\Models\Cuentabanco', 'id', 'id_cuenta');
    }
    

}
