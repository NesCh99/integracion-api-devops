@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-primary mb-2" href="{{route('usuarios.index')}}">Lista de Usuarios</a>
            <div class="card">

                <div class="card-header">{{ __('Inicio') }}</div>

                <div class="card-body">
                    @livewire('tabla-libros')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
