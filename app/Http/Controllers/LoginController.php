<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(!auth()->attempt($credentials)) {
            return back()->with('mensaje', 'Credenciales Incorrectas')->withInput();
        }

        return redirect()->intended('clientes.index');
    }
}
