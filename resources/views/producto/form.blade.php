@include('producto.barra')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' >
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('css/estilos_agregar_producto.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/estilosbarra.css') }}" type="text/css"> --}}
</head>
<br>
<body>
  <div class="container-fluid"> 
      <div class="page-body">
        <div class="container-x1">
            <div class="row row-cards">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                            
                                <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('Imagen Producto') }}
                                </h3>
                                </div>
                                <div class="card-body">
                                <img class="img-account-profile mb-2" src="{{ asset('img/products/default.webp') }}" id="image-preview" width="250" height="250" />

                                <div class="small font-italic text-muted mb-2">
                                    JPG or PNG no sea mas grande de 2MB
                                </div>

                                @if (isset($producto->foto))
                                <img src="{{ asset('storage/' . $producto->foto) }}" width="250" height="250">  
                                @endif
                                
                                <input
                                    type="file"
                                    accept="image/*"
                                    id="image"
                                    name="foto"
                                    class="form-control @error('foto') is-invalid @enderror"
                                    onchange="previewImage();"
                                >

                                {{-- @error('product_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                                
                            </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h3 class="card-title">
                                            {{ __('Producto') }}
                                        </h3>
                                    </div>

                                    <div class="card-actions">
                                        <a href="" class="btn-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <label for="category_id" class="form-label">
                                                Producto
                                                <span class="text-danger">*</span>
                                            </label>
                                            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                                            {{-- <input type="text" class="form-control" name="nombre" id="" placeholder="Nombre Producto"> --}}

                                            {{-- <x-input name="name"
                                                    id="name"
                                                    placeholder="Product name"
                                                    value="{{ old('name') }}"
                                            /> --}}
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                              <label for="category_id" class="form-label">
                                                    Categoria Porducto
                                                    <span class="text-danger">*</span>
                                              </label>
                                              {{ Form::select('categoria_id', $categorias, $producto->categoria_id, ['class' => 'form-select' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Una']) }}
                                              {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
                                                {{-- @error('category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror --}}
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="unidades_id">
                                                    {{ __('Unidad') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                {{ Form::select('unidades_id', $unidades, $producto->unidades_id, ['class' => 'form-select' . ($errors->has('unidades_id') ? ' is-invalid' : ''), 'placeholder' => 'Select One']) }}
                                                {!! $errors->first('unidades_id', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                            <label class="form-label" for="tax_type">
                                                {{ __('Clasificacion Tributaria') }}
                                            </label>
                                            <select type="text" class="form-select" name="clasificación_tributaria" id="clasificación_tributaria" value="{{ $producto->clasificación_tributaria }}">
                                            <option value="">Selecione Uno</option>
                                            <option value="19%">19%</option>
                                            <option value="5%">5%</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <label class="form-label" for="tax_type">
                                                {{ __('Referencia Fabrica') }}
                                            </label>
                                            <input type="text" class="form-control" name="referencia_fabrica" id="referencia_fabrica" placeholder="Referencia Fabrica" value=" {{ $producto->referencia_fabrica }} ">
                                            {{-- <x-input type="number"
                                                    label="Selling Price"
                                                    name="selling_price"
                                                    id="selling_price"
                                                    placeholder="0"
                                                    value="{{ old('selling_price') }}"
                                            /> --}}
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <label class="form-label" for="tax_type">
                                                {{ __('Marca') }}
                                            </label>
                                            {{ Form::select('marca_id', $marcas, $producto->marca_id, ['class' => 'form-select' . ($errors->has('marca_id') ? ' is-invalid' : ''), 'placeholder' => 'Select One']) }}
                                            {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <label class="form-label" for="tax_type">
                                                {{ __('Estado') }}
                                            </label>
                                            {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'] ,$producto->estado, ['class' => 'form-select' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Selecione Uno']) }}
                                            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <label class="form-label" for="tax_type">
                                                {{ __('Stock') }}
                                            </label>
                                            {{ Form::text('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'stock']) }}
                                            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        {{-- <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="tax_type">
                                                    {{ __('Tax Type') }}
                                                </label>

                                                <select name="tax_type" id="tax_type"
                                                        class="form-select @error('tax_type') is-invalid @enderror"
                                                >
                                                    @foreach(\App\Enums\TaxType::cases() as $taxType)
                                                    <option value="{{ $taxType->value }}" @selected(old('tax_type') == $taxType->value)>
                                                        {{ $taxType->label() }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('tax_type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div> --}}

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="notes" class="form-label">
                                                    {{ __('Descripcion') }}
                                                </label>

                                                {{-- {{ Form::textarea('descripcion', $producto->descripcion, ['class' => 'form-control @error('descripcion') is-invalid @enderror' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'rows' => '5']) }}
                                                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!} --}}

                                                <input name="descripcion"
                                                          id="descripcion"
                                                          type="text"
                                                          rows="5"
                                                          class="form-control"
                                                          placeholder="Descripción del Producto"
                                                          value="{{ $producto->descripcion }}"
                                                ></input>
                                                

                                                {{-- @error('descripcion')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.index') }}">Back</a>
                                    <button class="btn btn-sm btn-success" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('js/img-preview.js') }}"></script>
      </div>
    </div>
</body>
</html>

