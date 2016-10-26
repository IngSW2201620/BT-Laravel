<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class miControlador extends Controller
{

    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }


    public function miSolicitud(){
        return "Hola desde miControlador";
    }

}