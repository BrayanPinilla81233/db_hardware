{{-- @extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Categoria
@endsection

@section('content') --}}
@include('producto.barra', ['modo'=>'Editar Categoria'])
<link rel="stylesheet" href="{{ asset('css/categorias/edit.css') }}">
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('categorias.update', $categoria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categoria.form', ['modo'=>'Editar'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- @endsection --}}
