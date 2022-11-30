<?php

namespace App\Http\Controllers;

use App\Http\Servicios\Libreria;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function show($id)
    {
        $libreria = new Libreria();
        $libro = $libreria->getLibroPorId($id);
        $libroBd = Libro::where('libreria_id',$id)->pluck('usuario_id')->toArray();
        $usuarios = Usuario::whereIn('id',$libroBd)->get();
        return view('libros.mostrar', compact(['libro', 'usuarios']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuarios = Usuario::all();
        $libreria = new Libreria();
        $libro = $libreria->getLibroPorId($id);
        return view('libros.editar', compact(['usuarios', 'libro']));
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
    public function destroy($id)
    {
        //
    }

    public function asignar($libreriaId, $usuarioId)
    {
        Libro::create([
            'libreria_id' => $libreriaId,
            'usuario_id' => $usuarioId
        ]);

        return redirect()->route('libros.show',$libreriaId)->with('status', 'Usuario asignado con éxito');
    }

    public function quitar($libreriaId, $usuarioId)
    {
        $libro = Libro::where('libreria_id',$libreriaId)->where('usuario_id',$usuarioId)->first();
        $libro->delete();

        return redirect()->route('libros.show',$libreriaId)->with('status', 'Usuario quitado con éxito');
    }
}
