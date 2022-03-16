<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banco
 *
 * @property $id
 * @property $id_user
 * @property $id_banco
 * @property $nombreBancuent
 * @property $saldo
 * 
 * @property Cuentabanco[] $cuentabancos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class vista_bancos extends Model
{
    
    static $rules = [
		'id' => 'required',
		'id_user' => 'required',
        'id_banco' => 'required',
		'nombreBancuent' => 'required',
        'saldo' => 'required'

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_user',
        'id_banco',
        'nombreBancuent',
        'saldo'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentabancos()
    {
        return $this->hasMany('App\Models\Cuentabanco', 'id_banco', 'id_banco');
    }
    

}
