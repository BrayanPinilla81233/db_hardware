{{-- @extends('layouts.app')

@section('template_title')
    Producto
@endsection --}}

{{-- @section('content') --}}
    @include('producto.barra', ['modo'=>'Productos'])
    {{-- <link rel="stylesheet" href="{{ asset('css/index/index.css') }}"> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body" >
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12" >
                                    {{-- <button type="button" class="btn btn-outline-secondary">Options</button> --}}
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('productos.create') }}">Crear Producto</a></li>
                                        <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Crear Categoria</a></li>
                                        <li><a class="dropdown-item" href="{{ route('marcas.index') }}">Crear Marca</a></li>
                                        <li><a class="dropdown-item" href="{{ route('unidades.index') }}"">Crear Unidad</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" >
                                    <form action="{{ route('productos.index') }}" method="get">
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
                                                <input name="filtervalue" type="text" class="form-control" aria-label="Text input with segmented dropdown button"  placeholder="Buscar Producto....">
                                            </div>
                                            <div class=" col-sm-3">
                                                <button type="submit" class=" btn btn-dark">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            {{-- <div class="table-responsive" >   
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Buscar...">
                                </div>
                            </div>
                            <ul>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Options</a>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="{{ route('productos.create') }}">Crear Producto</a></li>
                                      <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Crear Categoria</a></li>
                                      <li><a class="dropdown-item" href="{{ route('marcas.index') }}">Crear Marca</a></li>
                                      <li><a class="dropdown-item" href="{{ route('unidades.index') }}"">Crear Unidad</a></li>
                                    </ul>
                                  </li>
                            </ul> --}}
                        </div>

                        <div class="container_datos">
                            <div class="table_container">
                                <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Categoria </th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Referencia Fabrica</th>
                                            <th>Clasificación Tributaria</th>
                                            <th>Unidades</th>
                                            <th>Stock</th>
                                            <th>Foto</th>
                                            <th>Estado</th>
                                            <th>Marca</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $producto->categoria->nombre }}</td>
                                                <td>{{ $producto->nombre }}</td>
                                                <td>{{ $producto->descripcion }}</td>
                                                <td>{{ $producto->referencia_fabrica }}</td>
                                                <td>{{ $producto->clasificación_tributaria }}</td>
                                                <td>{{ $producto->unidade->nombre }}</td>
                                                <td>{{ $producto->stock }}</td>
                                                <td><img src="{{ asset('storage/' . $producto->foto) }}" width="200" height="200"> </td>
                                                <td>{{ $producto->estado }}</td>
                                                <td>{{ $producto->marca->nombre }}</td>
                                                <td>
                                                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                    </div>
                    {!! $productos->links() !!}
                </div>
            </div>
        </div>

{{-- @endsection --}}
