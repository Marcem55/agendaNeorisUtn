<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');

        $contactos = DB::table('contacto')
        ->where('nombre', 'like', "%{$busqueda}%")
        ->orWhere('apellido', 'like', "{$busqueda}%")
        ->orderBy('nombre', 'asc')
        ->get();

        $parametros = [
            'contactos' => $contactos,
            'titulo' => 'Contactos'
        ];
        return view('contactos.contactos', $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactos.create-contacto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = new Contacto;
        $contacto->nombre = $request->input('nombre');
        $contacto->apellido = $request->input('apellido');
        $contacto->telefono = $request->input('telefono');
        $contacto->email = $request->input('email');
        $contacto->direccion = $request->input('direccion');
        $contacto->save();
        return redirect()->route('contactos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::findOrFail($id);
        return view('contactos.edit-contacto', compact('contacto'));
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
        $contacto = Contacto::findOrFail($id);
        $contacto->nombre = $request->input('nombre');
        $contacto->apellido = $request->input('apellido');
        $contacto->telefono = $request->input('telefono');
        $contacto->email = $request->input('email');
        $contacto->direccion = $request->input('direccion');
        $contacto->save();
        return redirect()->route('contactos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();
        return redirect()->route('contactos.index');
    }
}
