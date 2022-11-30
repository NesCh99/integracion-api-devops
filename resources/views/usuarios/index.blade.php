@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{route('usuarios.create')}}">
            <input type="submit"  class="btn btn-primary mb-2" value="Registrar Nuevo Usuario" />
        </form>
            <div class="card">
                <div class="card-header">{{ __('Usuarios Registrados') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($usuarios) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th colspan="3"></th>
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
                                <a class="btn btn-primary" href="{{route('usuarios.show', $usuario)}}">Ver</a>
                                </td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{url('/usuarios/'.$usuario->id.'/edit')}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('usuarios.destroy', $usuario)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar {{$usuario->nombre}}?')">
                                            Eliminar
                                        </button>
                                    </form>
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