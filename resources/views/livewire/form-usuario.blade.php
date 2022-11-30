<div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input wire:model.lazy="nombre" type="text" id="nombre" name="nombre" class="form-control">
        @error('nombre')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input wire:model.lazy="email" type="text" id="email" name="email" class="form-control">
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input wire:model.lazy="telefono" type="text" id="telefono" name="telefono" class="form-control">
        @error('telefono')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button wire:click.defer="guardarOActualizar" type="button" class="btn btn-primary mt-2">Guardar</button>
</div>
