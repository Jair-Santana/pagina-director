<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function displayLogin(){
        return view('auth.register');
    }

    public function checkLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        // imprimir en pantalla los datos que se reciben
        echo "Email: $email <br>";
        echo "Password: $password <br>";
    }
}
