<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrarController extends Controller
{
    public function vistaRegistrar()
    {
        return view('registrar.registrar');
    }

    public function registrar(Request $request)
    {
        $request->validate(['name'=>'required','email'=>'required|email','password'=>'required|min:8|confirmed'],
                           ['name.required'=>'Complete el campo Nombre','email.required'=>'Complete el campo Email','email.email'=>'Escriba un Email valido','password.required'=>'Complete el campo Contraseña','password.min'=>'La contraseña debe tener un minimo de 8 caracteres','password.confirmed'=>'Las contraseñas no coinsiden']);
        
        $user=User::create(request(['name','email','password']));

        auth()->login($user);

        return redirect()->to('/inicio');
    }
}
