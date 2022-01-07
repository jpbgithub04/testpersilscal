<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        return \response($productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required|numeric'],
                           ['nombre.required'=>'Complete el campo Nombre','descripcion.required'=>'Complete el campo Descripcion','precio.required'=>'Complete el campo Precio','precio.numeric'=>'Escriba digitos numericos']);
        $nombreImagen='sin imagen disponible.jpg';
                
        $producto=new Producto();
            
        $producto->nombre=request('nombre');
        $producto->descripcion=request('descripcion');
        $producto->precio=request('precio');
        $producto->foto=$nombreImagen;

        $producto->save();

        return \response($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Producto::findorFail($id);

        return \response($producto);
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
        $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required|numeric'],
                           ['nombre.required'=>'Complete el campo Nombre','descripcion.required'=>'Complete el campo Descripcion','precio.required'=>'Complete el campo Precio','precio.numeric'=>'Escriba digitos numericos']);
        $nombreImagen='sin imagen disponible.jpg';
                
        $producto=Producto::findorFail($id);
            
        $producto->nombre=request('nombre');
        $producto->descripcion=request('descripcion');
        $producto->precio=request('precio');
        $producto->foto=$nombreImagen;

        $producto->update();

        return \response($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);

        return \response('El producto con el ID: '.$id.' fue eliminado');
    }
}
