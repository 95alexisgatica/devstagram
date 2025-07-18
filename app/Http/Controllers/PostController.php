<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{   
    public function __construct()
    {   
        // si no estoy autenticado, no puedo acceder a los métodos de este controlador
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }
}
