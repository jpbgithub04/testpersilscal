@extends('layout.app')

@section('title','Carga de Productos')

@section('content')
    <h2 class="titulo_seccion">Carga de Productos</h2>
    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
    @csrf    
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                @error('nombre')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control @error('descripcion') is-invalid @enderror">{{old('descripcion')}}</textarea>
                @error('descripcion')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}">
                @error('precio')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" />
                @error('foto')<small class="invalid-feedback font-weight-bold">{{ $message }}</small>@enderror
            </div>            
        </div>
        <input type="submit" value="Almacenar" class="btn btn-secondary mt-2">
    </form>
@endsection