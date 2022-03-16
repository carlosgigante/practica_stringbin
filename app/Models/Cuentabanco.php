<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuentabanco
 *
 * @property $id
 * @property $id_user
 * @property $id_banco
 * @property $tipo_cuenta
 * @property $saldo
 * @property $created_at
 * @property $updated_at
 *
 * @property Banco $banco
 * @property Transaccion[] $transaccions
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuentabanco extends Model
{
    
    static $rules = [
		'id' => 'required',
		'id_user' => 'required',
		'id_banco' => 'required',
		'tipo_cuenta' => 'required',
		'saldo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_user','id_banco','tipo_cuenta','saldo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function banco()
    {
        return $this->hasOne('App\Models\Banco', 'id_banco', 'id_banco');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaccions()
    {
        return $this->hasMany('App\Models\Transaccion', 'id', 'id_cuenta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    
    public function getBanco($id){

        $nombre = Banco::where('id_banco', '=', $id)->pluck('nombre_banco');


        return $nombre;

    }
}
