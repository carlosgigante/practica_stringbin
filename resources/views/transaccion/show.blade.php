@extends('layouts.app')

@section('template_title')
    {{ $transaccion->name ?? 'Show Transaccion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Transaccion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuentas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Transaccion:</strong>
                            {{ $transaccion->id_transaccion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cuenta:</strong>
                            {{ $transaccion->id_cuenta }}
                        </div>
                        <div class="form-group">
                            <strong>Id Categoria:</strong>
                            {{ $transaccion->id_categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $transaccion->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $transaccion->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Transaccion:</strong>
                            {{ $transaccion->tipo_transaccion }}
                        </div>
                        <div class="form-group">
                            <strong>Nota:</strong>
                            {{ $transaccion->nota }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
