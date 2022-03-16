<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\Vista;
use App\Models\Categorium;
use App\Models\vista_bancos;
use App\Models\vista_transaccion;
use App\Models\Cuentabanco;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Queue\NullQueue;
use phpDocumentor\Reflection\Types\Null_;
use SebastianBergmann\Type\NullType;

/**
 * Class TransaccionController
 * @package App\Http\Controllers
 */
class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $transaccions = vista_transaccion::where('id_user', '=', auth()->user()->id)
                                    ->paginate();

        return view('transaccion.index', compact('transaccions')) 
            ->with('i', (request()->input('page', 1) - 1) * $transaccions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $confirmacion = Cuentabanco::where('id_user', '=', auth()->user()->id)
                                ->count();

        if($confirmacion == 0){

            return redirect()->route('billeteras.index')
            ->with('error', 'Para crear una billetera, primero debe tener una
             cuenta agregada.');

        }
        else{
            $transaccion = new Transaccion();

            //$datosBanco = Cuentabanco::where('id_user', '=', auth()->user()->id)->pluck('id_banco', 'tipo_cuenta', 'saldo');
            /*$datosBanco = Cuentabanco::join('bancos', 'bancos.id_banco', 'cuentabancos.id_banco')
                                ->where('id_user', '=', auth()->user()->id)
                                ->pluck('CONCAT(nombre_banco, " - ", tipo_cuenta) as nombreBanco', 'id');*/
            $datosBanco = vista_bancos::where('id_user', '=', auth()->user()->id)
                                    ->pluck('nombreBancuent', 'id');
            /*$datosBanco = DB::select('select CONCAT( nombre_banco, " - ", tipo_cuenta) AS nombreBancuenta, id 
                                FROM `cuentabancos`, bancos WHERE cuentabancos.id_banco = bancos.id_banco and id_user = ?',                              
                                [auth()->user()->id]);*/
            $datosCate = Categorium::pluck('nombre_categoria', 'id_categoria');
        
            //$nombreBanco = new Cuentabanco();

            //$nombreBanco->getBanco(auth()->user()->id);

        

            return view('transaccion.create', compact('transaccion', 'datosBanco', 'datosCate'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTransaccion = request()->except('_token');
        Transaccion::insert($datosTransaccion);

        return redirect()->route('billeteras.index')
            ->with('success', 'Billetera creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaccion = Transaccion::find($id);

        return view('transaccion.show', compact('transaccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaccion = Transaccion::find($id);

        $datosBanco = vista_bancos::where('id_user', '=', auth()->user()->id)
                                ->pluck('nombreBancuent', 'id');

        $datosCate = Categorium::pluck('nombre_categoria', 'id_categoria');                        

        return view('transaccion.edit', compact('transaccion', 'datosBanco', 'datosCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transaccion $transaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*request()->validate(Transaccion::$rules);

        $transaccion->update($request->all());*/

        $transaccion = Transaccion::find($id);
        $transaccion->id_cuenta = $request->get('id_cuenta');
        $transaccion->id_categoria = $request->get('id_categoria');
        $transaccion->monto = $request->get('monto');
        $transaccion->fecha = $request->get('fecha');
        $transaccion->tipo_transaccion = $request->get('tipo_transaccion');
        $transaccion->nota = $request->get('nota');
        $transaccion->save();

        return redirect()->route('billeteras.index')
            ->with('success', 'Datos actualizados con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Transaccion::find($id)->delete();

        return redirect()->route('billeteras.index')
            ->with('success', 'Transaccion deleted successfully');
    }
}
