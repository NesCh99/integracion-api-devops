@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-primary mb-2" href="{{url('/libros/'.$libro[0]->ID.'/edit')}}">Asignar a un Usuario</a>
            <div class="card">
                <div class="card-header">{{ __('Información del Libro') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm">
                            <b>Titulo</b>
                        </div>
                        <div class="col-sm">
                            <b>Autor</b>
                        </div>
                        <div class="col-sm">
                            <b>Fecha de Publicación</b>
                        </div>
                        <div class="col-sm">
                            <b>Portada</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            {{$libro[0]->title}}
                        </div>
                        <div class="col-sm">
                        {{$libro[0]->author}}
                        </div>
                        <div class="col-sm">
                        {{$libro[0]->publisher_date}}
                        </div>
                        <div class="col-sm">
                        <img src="{{$libro[0]->thumbnail}}" class="img-thumbnail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <b>Lenguaje</b>
                        </div>
                        <div class="col-sm">
                            <b>Contenido</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            {{$libro[0]->language}}
                        </div>
                        <div class="col-sm">
                        {{$libro[0]->content_short}}
                        </div>
                    </div>
                    <h3 class="mt-2">Lista de Usuarios Asignados al Libro</h3>
                    @if(count($usuarios) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $indice => $usuario)
                            <tr>
                                <th scope="row">{{$indice + 1}}</th>
                                <td>{{$usuario->nombre}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->telefono}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('libros.quitar', [$libro[0]->ID, $usuario->id])}}">Quitar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No existen usuarios registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection