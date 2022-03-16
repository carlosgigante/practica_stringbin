<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Banco') }}
            {{ Form::select('id_banco', $datosBanco , $cuentabanco->id_banco, ['class' => 'form-control' . ($errors->has('id_banco') ? ' is-invalid' : ''), 'placeholder' => 'Banco']) }}
            {!! $errors->first('id_banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_cuenta') }}
            {{ Form::select('tipo_cuenta',['Ahorro', 'Corriente'], $cuentabanco->tipo_cuenta, ['class' => 'form-control' . ($errors->has('tipo_cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Cuenta']) }}
            {!! $errors->first('tipo_cuenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('saldo') }}
            {{ Form::number('saldo', $cuentabanco->saldo, ['class' => 'form-control' . ($errors->has('saldo') ? ' is-invalid' : ''), 'placeholder' => 'Saldo']) }}
            {!! $errors->first('saldo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>