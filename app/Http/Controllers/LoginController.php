<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        
        // Validación
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) 
        {
            return back()->with('mensaje', 'credenciales Incorrectas');
        }

        //Redireccionar
        return redirect()->route('posts.index', auth()->user()->username);

    }        
}
