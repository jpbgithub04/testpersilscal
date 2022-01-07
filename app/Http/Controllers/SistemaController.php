<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicio()
    {
        return view('inicio');
    }
}
