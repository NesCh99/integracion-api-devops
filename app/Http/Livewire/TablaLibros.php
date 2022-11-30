<?php

namespace App\Http\Livewire;

use App\Http\Servicios\Libreria;
use Livewire\Component;

class TablaLibros extends Component
{
    public $categoria = '';

    public function render()
    {
        $libreria = new Libreria();

        $categorias = $libreria->getCategorias();

        $libros = $libreria->getLibrosPorCategoria($this->categoria);

        return view('livewire.tabla-libros',[
            'categorias' => $categorias,
            'libros' => $libros
        ]);
    }

    public function setCategoria(string $categoria)
    {
        $this->categoria = $categoria;
    }
}
