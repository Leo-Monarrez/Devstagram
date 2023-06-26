<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        dd($user->username);
       //validacion
       $this->validate($request,[ 
        'comentario' => 'required|max:255'
       ]);

       //almacenamiento del resultado
       Comentario::create([
        'user_id' => auth()->user()->id,
        'post_id' => $post->id,
        'comentario' => $request->comentario
       ]);

       //imprime el mensaje:
       return back()->with('mensaje', 'Comentario Realizado Correctamente');
    }
}


