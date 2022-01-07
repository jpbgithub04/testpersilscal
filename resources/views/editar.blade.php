@extends('layout.app')

@section('title','Editar Producto')

@section('content')
    <h2 class="titulo_seccion">Editar Producto</h2>
    @if(session('mensaje'))
        <div class="alert alert-success font-weight-bold text-center">{{ session('mensaje') }}</div>
    @endif
    <form action="{{ route('productos.update',$producto->id) }}" method="post" enctype="multipart/form-data">
    @csrf    
    @method('put')
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$producto->nombre)}}">
                @error('nombre')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control @error('descripcion') is-invalid @enderror">{{old('descripcion',$producto->descripcion)}}</textarea>
                @error('descripcion')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio',$producto->precio)}}">
                @error('precio')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" />
                @error('foto')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
                <input type="hidden" name="imagenActual" value="{{ $producto->foto }}">
            </div>            
        </div>
        <input type="submit" value="Editar" class="btn btn-secondary mt-2">
    </form>
    <form action="{{ route('productos.destroy',$producto->id) }}" id="forme" method="post">
        @csrf
        @method('delete')
        <div class="row mt-2">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <input type="submit" value="Eliminar" class="btn btn-danger font-weight-bold">
            </div>
        </div>
    </form>
@endsection