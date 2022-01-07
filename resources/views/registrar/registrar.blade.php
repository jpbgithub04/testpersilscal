@extends('layout.app')

@section('title','Registrar')

@section('content')
    <h2>Registrar Usuario</h2>
    <form action="{{route('sistema.registrar')}}" method="post">
        @csrf        
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="name" class="font-weight-bold">Nombre</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name') <small class="invalid-feedback font-weight-bold">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email') <small class="invalid-feedback font-weight-bold">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="password" class="font-weight-bold">Contraseña</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <small class="invalid-feedback font-weight-bold">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="confirm_password" class="font-weight-bold">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        </div>
        <input type="submit" value="Registrar" class="btn btn-secondary mt-2">
    </form>
@endsection