<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ComentarioController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\RegisterController;
use App\Models\Comentario;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

//Rutas de navegación
Route::view('/aboutme', 'aboutme');

//Ruta para mostrar-formulario-registro
Route::get('/register', [RegisterController::class,'index'])->name("register");

//Ruta para enviar-datos-registro
Route::post('/register', [RegisterController::class,'store']);

//Ruta para muro-peril-usuario
Route::get('/muro',[PostController::class, 'index'])->name("posts.index");

//Ruta para vista-login
Route::get('/login',[LoginController::class, 'index'])->name("login");

//Ruta para validación-login
Route::post('/login', [LoginController::class, 'store']);

//Ruta para cerrar-sesión
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');



//Ruta para vista muro-perfil-usuario
Route::get('/{user:username}',[PostController::class, 'index'])->name("posts.index");

//Ruta para el formulario de post-publicación
Route::get('/post/create',[PostController::class, 'create'])->name('post.create');

//Ruta para almacenar-post
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



//Ruta para mostrar-post
Route::get('{user:username}/posts/{post}', [PostController::class, 'show'])->name('post.show');


//Ruta para almacenar-comentarios
Route::post('{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');


Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



//Ruta para almacenar-imagenes
Route::post('/imagenes', [ImagenController::class,'store'])->name('imagenes.store');