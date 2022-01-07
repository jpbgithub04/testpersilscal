<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();
        return view('productos',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty(request('foto'))){
            $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required|numeric'],
                               ['nombre.required'=>'Complete el campo Nombre','descripcion.required'=>'Complete el campo Descripcion','precio.required'=>'Complete el campo Precio','precio.numeric'=>'Escriba digitos numericos']);

            $nombreImagen='sin imagen disponible.jpg';
        }else{
            $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required|numeric','foto'=>'image'],
                               ['nombre.required'=>'Complete el campo Nombre','descripcion.required'=>'Complete el campo Descripcion','precio.required'=>'Complete el campo Precio','precio.numeric'=>'Escriba digitos numericos','foto.image'=>'Seleccione un archivo del tipo imagen']);

            $nombreImagen=str::random(10).$request->file('foto')->getClientOriginalName();
            $ruta=storage_path().'/app/public/imagenes/'.$nombreImagen;
                        
            Image::make($request->file('foto'))->
                    resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);
        }
        
        try{
            $producto=new Producto();
            
            $producto->nombre=request('nombre');
            $producto->descripcion=request('descripcion');
            $producto->precio=request('precio');
            $producto->foto=$nombreImagen;

            $producto->save();

            return redirect()->route('productos.productos');
        }catch(\Exception $e){
            echo 'No se puede almacenar el producto '.$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::find($id);
        return view('editar',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(empty(request('foto'))){
            $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required|numeric'],
                               ['nombre.required'=>'Complete el campo Nombre','descripcion.required'=>'Complete el campo Descripcion','precio.required'=>'Complete el campo Precio','precio.numeric'=>'Escriba digitos numericos']);

            $nombreImagen=request('imagenActual');
            
        }else{
            $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required|numeric','foto'=>'image'],
                               ['nombre.required'=>'Complete el campo Nombre','descripcion.required'=>'Complete el campo Descripcion','precio.required'=>'Complete el campo Precio','precio.numeric'=>'Escriba digitos numericos','foto.image'=>'Seleccione un archivo del tipo imagen']);

            $nombreImagen=str::random(10).$request->file('foto')->getClientOriginalName();
            $ruta=storage_path().'/app/public/imagenes/'.$nombreImagen;
                        
            Image::make($request->file('foto'))->
                    resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta);

            $url='/public/imagenes/'.request('imagen_actual');

            Storage::delete($url);
        }
        
        try {
            $producto=Producto::find($id);

            $producto->nombre=request('nombre');
            $producto->descripcion=request('descripcion');
            $producto->precio=request('precio');
            $producto->foto=$nombreImagen;

            $producto->update();

            return redirect()->route('productos.edit',$producto->id)->with('mensaje','Producto editado satisfactoriamente');
        } catch (\Exception $e) {
            echo 'No se pudo editar el producto '.$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $producto=Producto::find($id);            

            $url='/public/imagenes/'.$producto->foto;

            Storage::delete($url);

            $producto->delete();

            return redirect()->route('productos.productos')->with('mensaje','eliminar');;

        }catch(\Exception $e){
            echo 'No se pudo eliminar el producto '.$e->getMessage();
        }
    }
}
