<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    /** https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller **/

    public function index()
    {
        return view('auth.register');
    }

    // POST
    public function store(Request $request)
    {
        //dd($request);
        //dd($request->get('username'));

        //Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request, [
            'name'      => 'required|max:30',
            'username'  => 'required|unique:users|min:3|max:20',
            'email'     => 'required|unique:users|email|max:60',
            'password'  => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => Str::lower($request->email),
            'password'  => Hash::make($request->password)
        ]);

        //Autenticación
        /*
        auth()->attempt([
            'email'     => Str::lower($request->email),
            'password'  => $request->password
        ]);
        */
        auth()->attempt($request->only('email', 'password'));

        //Redireccionar
        return redirect()->route('posts.index');

    }    

    // DELETE
    public function destroy()
    {
        dd('Dellete ...');
    }     
}
