@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{route('usuarios.create')}}">
            <input type="submit"  class="btn btn-primary mb-2" value="Registrar Nuevo Usuario" />
        </form>
            <div class="card">
                <div class="card-header">{{ __('Información de un Usuario') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm">
                        {{$usuario->nombre}}
                        </div>
                        <div class="col-sm">
                        {{$usuario->email}}
                        </div>
                        <div class="col-sm">
                        {{$usuario->telefono}}
                    </div>
                    <h3>Lista de libros asignados al usuario</h3>
                    @if($libros)
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Año de Publicación</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $indice => $lib)
                        <tr>
                            <th scope="row">{{$indice + 1}}</th>
                            <td>{{$lib->titulo}}</td>
                            <td>{{$lib->autor}}</td>
                            <td>{{$lib->publicacion}}</td>
                            <td width="10px">
                            <a class="btn btn-primary" href="{{route('libros.show', $lib->id)}}">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @else
                    <p class="mt-2">El usuario no posee libros</p>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection