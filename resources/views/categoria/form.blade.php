<link rel="stylesheet" href="{{ asset('css/categorias/form.css') }}">
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre Categoria') }} <br>
            {{ Form::text('nombre', $categoria->nombre, ['class' => 'input' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!} <br>
            <input class="btn" type="submit" value="{{ $modo }} Datos">
    </div>
</div>
