<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Crear nuestro primer metodo
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // 'dd' "dump and die imprime" lo que se tiene en el valor de 'dd', se detiene la ejecucion total de laravel
        //dd($request);

        //Modificar el $request para que no se repitan los "username"
        $request->request->add(['username'=>Str::slug($request->username)]);
        // Validar datos del formulario
        $this->validate($request,[
            //Pasamos las reglas de validacion de cada uno de los campos
            //Validamos "username", "email" como unico relacionados con la tabla "users", 
            //generada automaticamente con la instalacion de laravel
            'name'=>'required|min:3|max:20',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>''
        ]);
        //Insertar datos a la tabla de usuarios
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_confirmation'=>Hash::make($request->password_confirmation)
        ]);
        //Autenticar un usuario con el metodo "attempt" 
        //Forma 1

        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        //Forma 2
        /*
        auth()->attempt($request->only('email','password'));
        */
        //Redirecciondo
        return redirect()->route('post_index', auth()->user()->username);
    }
}
