{{-- @extends('layouts.app')

@section('template_title')
    Unidade
@endsection

@section('content') --}}
@include('producto.barra', ['modo'=>'Unidades'])
<body>
    @livewireStyles
    @livewire('units-component');
    @livewireScripts
</body>
    

