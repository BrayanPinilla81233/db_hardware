{{-- @extends('layouts.app')

@section('template_title')
    Categoria
@endsection

@section('content') --}}
@include('producto.barra', ['modo'=>'Categorias'])
@livewireStyles
<body>
    @livewire('categories-component')
    @livewireScripts
</body>
{{-- <link rel="stylesheet" href="{{ asset('css/categorias/index.css') }}"> --}}

