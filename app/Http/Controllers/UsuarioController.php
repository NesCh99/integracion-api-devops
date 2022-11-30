<?php

namespace App\Http\Controllers;

use App\Http\Servicios\Libreria;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.registrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        $libreria = new Libreria();
        $librosBD = Libro::where('usuario_id',$usuario->id)->get();
        $libros = [];
        foreach($librosBD as $lib){
            $libro = $libreria->getLibroPorId($lib->libreria_id);
            $libros[] = [
                'id' => $libro[0]->ID,
                'titulo' => $libro[0]->title,
                'autor' => $libro[0]->author,
                'publicacion' => $libro[0]->publisher_date,
            ];
        }
        $libros = json_decode(json_encode($libros));
        return view('usuarios.mostrar', compact(['usuario', 'libros']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('status', 'Usuario eliminado con éxito');
    }
}
