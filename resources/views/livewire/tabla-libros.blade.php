<div>
    <select class="form-select" aria-label="Default select example" wire:model="categoria" >
    <option selected>Selecciona una categoría...</option>
    @foreach($categorias as $cat)
    <option value="{{$cat->nicename}}">{{$cat->name}}</option>
    @endforeach
    </select>
    @if($libros)
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Año de Publicación</th>
            <th>Portada</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($libros as $indice => $lib)
        <tr>
            <th scope="row">{{$indice + 1}}</th>
            <td>{{$lib->title}}</td>
            <td>{{$lib->author}}</td>
            <td>{{$lib->publisher_date}}</td>
            <td><img src="{{$lib->thumbnail}}" class="img-thumbnail"></td>
            <td width="10px">
            <a class="btn btn-primary" href="{{route('libros.show', $lib->ID)}}">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @else
    <p>Por favor, seleccione una categoria</p>
    @endif
</div>
