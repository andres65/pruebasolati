<div class="form-group {{ $errors->has('cat_name') ? 'has-error' : ''}}">
    <label for="cat_name" class="control-label">{{ 'Nombre Categoría' }}</label>
    <input class="form-control" name="cat_name" type="text" id="cat_name" value="{{ isset($datos['cat_name']) ? $datos['cat_name'] : ''}}" required>
    {!! $errors->first('cat_name', '<p class="help-block">:message</p>') !!}
</div>
<br>
<div class="form-group {{ $errors->has('cat_description') ? 'has-error' : ''}}">
    <label for="cat_description" class="control-label">{{ 'Descripción Categoría' }}</label>
    <input class="form-control" name="cat_description" type="text" id="cat_description" value="{{ isset($datos['cat_description']) ? $datos['cat_description'] : ''}}" required>
    {!! $errors->first('cat_description', '<p class="help-block">:message</p>') !!}
</div>

<hr>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Editar Categoría' : 'Agregar Categoría' }}">
</div>

