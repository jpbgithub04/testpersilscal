<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function vistaLogin()
    {
        return view('sesion.login');
    }

    public function login(Request $request)
    {
        $request->validate(['email'=>'required|email','password'=>'required'],['email.required'=>'Complete el campo Email','email.email'=>'Escriba un Email valido','password.required'=>'Complete el campo Contraseña']);

        if(auth()->attempt(request(['email','password']))==false){
            $request->session()->regenerate();

            return back()->withErrors(['mensaje'=>'Email o contraseña invalidos']);
        }

        return redirect()->to('/productos');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->to('/login');
    }
}
