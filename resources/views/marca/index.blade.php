{{-- @extends('layouts.app')

@section('template_title')
    Marca
@endsection

@section('content') --}}
@include('producto.barra', ['modo'=>'Marcas'])
@livewireStyles
<body>
    @livewire('brands-component');
    @livewireScripts
</body>
{{-- @endsection --}}
