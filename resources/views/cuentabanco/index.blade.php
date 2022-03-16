@extends('layouts.app')

@section('template_title')
    Cuentabanco
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cuentabanco') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cuentas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($cuentabancos) == 0)
                                <div style="text-align:center">
                                    <h1>Aún no agregas ninguna cuenta</h1> 
                                </div> 
                            @else
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Banco</th>
										<th>Tipo Cuenta</th>
										<th>Saldo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuentabancos as $cuentabanco)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cuentabanco->Banco->nombre_banco }}</td>
											<td>{{ $cuentabanco->tipo_cuenta }}</td>
											<td>{{ $cuentabanco->saldo }}</td>

                                            <td>
                                                <form action="{{ route('cuentas.destroy',$cuentabanco->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('cuentas.edit',$cuentabanco->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $cuentabancos->links() !!}
            </div>
        </div>
    </div>
@endsection
