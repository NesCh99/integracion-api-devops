<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Livewire\Component;

class FormUsuario extends Component
{
    public $nombre;
    public $email;
    public $telefono;
    public $idUsuario;

    protected $rules = [
        'nombre'      => 'required',
        'email' => 'required|email',
        'telefono'     => 'required'
    ];

    public function mount()
    {
        if($this->idUsuario > 0){
            $usuario = Usuario::find($this->idUsuario);
            $this->nombre = $usuario->nombre;
            $this->email = $usuario->email;
            $this->telefono = $usuario->telefono;
        }
    }

    public function render()
    {
        
        return view('livewire.form-usuario');
    }

    public function guardarOActualizar()
    {
        $this->validate();
        Usuario::updateOrCreate(
            ['id' => $this->idUsuario],
        [
            'nombre' => $this->nombre,
            'email' => $this->email,
            'telefono' => $this->telefono,
        ]);

        return redirect()->route('usuarios.index')->with('status', 'Solicitud procesada con éxito');
    }
}
