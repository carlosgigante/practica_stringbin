@extends('layouts.app')

@section('template_title')
    {{ $cuentabanco->name ?? 'Show Cuentabanco' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cuentabanco</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cuentas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Cuenta:</strong>
                            {{ $cuentabanco->id }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $cuentabanco->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Banco:</strong>
                            {{ $cuentabanco->id_banco }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Cuenta:</strong>
                            {{ $cuentabanco->tipo_cuenta }}
                        </div>
                        <div class="form-group">
                            <strong>Saldo:</strong>
                            {{ $cuentabanco->saldo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
