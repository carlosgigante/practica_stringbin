<?php

namespace App\Http\Controllers;

use App\Models\Cuentabanco;
use App\Models\Banco;
//use App\Models\User;

use Illuminate\Http\Request;

/**
 * Class CuentabancoController
 * @package App\Http\Controllers
 */
class CuentabancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $cuentabancos = Cuentabanco::where('id_user', '=', auth()->user()->id)->paginate();

        return view('cuentabanco.index', compact('cuentabancos'))
            ->with('i', (request()->input('page', 1) - 1) * $cuentabancos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentabanco = new Cuentabanco();
       // auth::user()->id_roles == '2'; 
        $datosBanco = Banco::pluck('nombre_banco', 'id_banco');

        return view('cuentabanco.create', compact('cuentabanco', 'datosBanco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate(Cuentabanco::$rules);
        Cuentabanco::create($request->all());*/

        $datosCuentas = request()->except('_token');
        Cuentabanco::insert($datosCuentas);


        return redirect()->route('cuentas.index')
            ->with('success', 'Cuenta creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuentabanco = Cuentabanco::find($id);

        return view('cuentabanco.show', compact('cuentabanco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentabanco = Cuentabanco::find($id);

        $datosBanco = Banco::pluck('nombre_banco', 'id_banco');

        return view('cuentabanco.edit', compact('cuentabanco', 'datosBanco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cuentabanco $cuentabanco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //request()->validate(Cuentabanco::$rules);

        //$cuentabanco->update($request->all());
        $cuentabanco = Cuentabanco::find($id);
        $cuentabanco->id_banco = $request->get('id_banco');
        $cuentabanco->tipo_cuenta = $request->get('tipo_cuenta');
        $cuentabanco->saldo = $request->get('saldo');
        $cuentabanco->save();

        return redirect()->route('cuentas.index')
            ->with('success', 'Datos actualizados con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id_cuenta)
    {
        $cuentabanco = Cuentabanco::find($id_cuenta)->delete();

        return redirect()->route('cuentas.index')
            ->with('success', 'Cuentabanco deleted successfully');
    }

    public function getBanco($id){

        $nombre = Banco::get('nombre_banco')->where('id_banco', '=', $id);

        return $nombre;

    }
}
