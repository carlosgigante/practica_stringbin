<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class vista_transaccion
 *
 * @property $id_transaccion
 * @property $nombre_banco
 * @property $tipo_cuenta
 * @property $nombre_categoria
 * @property $monto
 * @property $fecha
 * @property $tipo_transaccion
 * @property $nota
 * 
 * @property Cuentabanco[] $cuentabancos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class vista_transaccion extends Model
{
    
    static $rules = [
		'id_transaccion' => 'required',
		'nombre_banco' => 'required',
        'tipo_cuenta' => 'required',
		'nombre_categoria' => 'required',
        'monto' => 'required',
        'fecha' => 'required',
        'tipo_transaccion' => 'required',
        'nota' => 'required'

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nombre_banco',
        'tipo_cuenta',
        'nombre_categoria',
        'monto',
        'fecha',
        'tipo_transaccion',
        'nota'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentabancos()
    {
        return $this->hasMany('App\Models\Cuentabanco', 'id_banco', 'id_banco');
    }
    

}
