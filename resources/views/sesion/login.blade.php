@extends('layout.app')

@section('title','Iniciar Sesion')

@section('content')    
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">Iniciar Sesion</div>
                <div class="card-body">
                    <form action="{{route('sistema.login')}}" method="post">
                    @csrf  
                        <div class="form-group row justify-content-center">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email') <small class="invalid-feedback font-weight-bold">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <label for="password" class="font-weight-bold">Contraseña</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <small class="invalid-feedback font-weight-bold">{{ $message }}</small> @enderror
                            </div>
                        </div>                        
                        <div class="form-group row justify-content-center">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input type="submit" value="Ingresar" class="btn btn-secondary mt-2">
                            </div>                        
                        </div>
                    </form>
                    @error('mensaje') <div class="alert alert-danger text-center font-weight-bold mt-2">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </div>    
@endsection