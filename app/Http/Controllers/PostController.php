<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //Generar metodo construct para proteger las rutas
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);    }

    // Generar metodo index para mostrar los post de la publicacion
    public function index(User $user)
    {   
        $posts = Post::where('user_id', $user->id)->paginate(3);
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    

    //Generar metodo create para mostrar el formulario de post
    public function create(){
      
        return view('posts.create');
    }

  //Generar metodo store para almacenar los datos del formulario
  public function store(Request $request) {
    $this->validate($request, [
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'imagen' => 'required'
    ]);

   
    /*Post::create([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'imagen' => $request->imagen,   //-> store('posts', 'public')
        //Identificar el usuario que esta logueado en el sistema
        'user_id' => auth()->user()->id */

        
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,   
            'user_id' => auth()->user()->id
        ]);

    

    //Redireccionar a la vista del usuario logueado con el post creado
    return redirect()->route('posts.index', auth()->user()->username);

}

//Generar metodo show para mostrar el post de la publicacion
    public function show(User $user, Post $post)
    {
        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
       $this->authorize('delete', $post);
       $post->delete();

       $imagen_path = public_path('uploads/' . $post->imagen);

       if(File::exists($imagen_path)){
          unlink($imagen_path);
       }

       return redirect()->route('post.index', auth()->user()->username);
    }

}