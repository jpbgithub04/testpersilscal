<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - Sistema Test</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('js/app.js') }}"></script>    
                
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('productos.productos')}}">Sistema - TEST</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="#">{{ auth()->user()->name }}</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.productos') }}">Productos</a>
                        </li>                 
                        <li class="nav-item">                        
                            <form action="{{route('sistema.logout')}}" method="post">
                            @csrf
                            <a class="nav-link" href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
                            </form>
                        </li>                    
                    @else                
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sistema.vistaLogin')}}">Iniciar Sesion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sistema.registroIndex') }}">Registrarse</a>
                        </li>
                    @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        <div class="footer text-center text-white font-weight-bold bg-dark p-2 mt-2">
            <p>Todos los derechos reservados &copy {{ date('Y') }}</p>            
        </div>        
        <script src="{{ asset('js/funciones.js') }}"></script>
    </body>
</html>