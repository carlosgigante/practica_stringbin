<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_banco') }}
            {{ Form::text('id_banco', $banco->id_banco, ['class' => 'form-control' . ($errors->has('id_banco') ? ' is-invalid' : ''), 'placeholder' => 'Id Banco']) }}
            {!! $errors->first('id_banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_banco') }}
            {{ Form::text('nombre_banco', $banco->nombre_banco, ['class' => 'form-control' . ($errors->has('nombre_banco') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Banco']) }}
            {!! $errors->first('nombre_banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>