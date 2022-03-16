@extends('layouts.app')

@section('template_title')
    Transaccion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Transaccion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('billeteras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nueva billetera') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($transaccions) == 0)
                                <div style="text-align:center">
                                    <h1>Aún no agregas ninguna billetera</h1> 
                                </div> 
                            @else
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Banco</th>
                                        <th>Tipo de cuenta</th>
										<th>Categoria</th>
										<th>Monto</th>
										<th>Fecha</th>
										<th>Tipo de transaccion</th>
										<th>Nota</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaccions as $transaccion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $transaccion->nombre_banco }}</td>
                                            <td> {{ $transaccion->tipo_cuenta }} </td>
											<td>{{ $transaccion->nombre_categoria }}</td>
											<td>{{ $transaccion->monto }}</td>
											<td>{{ $transaccion->fecha }}</td>
											<td>{{ $transaccion->tipo_transaccion }}</td>
                                            @if($transaccion->nota == NULL)

                                            <td>Sin comentarios</td>

                                            @else

											<td>{{ $transaccion->nota }}</td>

                                            @endif

                                            <td>
                                                <form action="{{ route('billeteras.destroy',$transaccion->id_transaccion) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('billeteras.edit',$transaccion->id_transaccion) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
                {!! $transaccions->links() !!}
            </div>
        </div>
    </div>   
    
@endsection
