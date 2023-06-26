@extends('layouts.app')

@section('titulo')
  {{ $post->titulo }}

@endsection


@section('contenido')
   <div class="container mx-auto flex">
      <div class="md:w-1/2">
           <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
      </div>

           <div class="p-3">
            <p>0 likes</p>
           </div>

           <div class="p-3">
            <p class="font-bold"> {{ $post->user->username }}</p>
            <p class="text-sn text-gray-500">{{ $post->created_at->diffForHumans}} </p>
            <p class="nt-5"> {{ $post->descripcion }} </p>
           </div>
             
           @auth
             @if($post->user_id === auth()->user()->id)
           <form method="POST" action="{{ route('posts.destroy, $post')}}"> 
                @method('DELETE')
                @csrf
                <input 
                type="submit"
                value="Eliminar Publicacion"
                class="br-red-5000 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer" 
                />
           </form>
             @endif;
           @endauth

      <div class="md:w-1/2">
           
        <div class="shadow bg-white p-5 mb-5">
            <p class="text-xl font-bold text-center mb-4"> Agrega un nuevo comentario :3 </p>

            @if(session('mensaje'))
              <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                {{session('mensaje')}}
              </div>

            @endif

            <form>
                <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 mt:mt-0">
                    <form action="{{route('comentarios.store')}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Titulo
                            </label>
                            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicación" class="border p-3 w-full rounded-lg 
                            @error('titulo') border-red-500 @enderror" value="{{old('titulo')}}">
                            @error('titulo')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-center">
                                    {{$message}}
                                </p>
                            @enderror
        
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Descripción
                            </label>
                            <textarea type="text" id="comentario" name="comentario" placeholder="Agrega un comentario" class="border p-3 w-full rounded-lg 
                            @error('name') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
    
                        <input type="submit" value="Comentar" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
            @endauth
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if($post->comentarios->count())
                    @foreach ( $post->comentarios as $comentario )
                        <div class="p-5 border-gray-300 border-b">
                            <a href="{{ route('posts.index', $comentario->user)}}" class="font-bold">
                               {{ $comentario->comentario}}
                            </a>
                             <p>{{ $comentario->comentario}}
                             <p class="text-sn text-gray-500"> {{ $comentario->created_at->diffForHumans()}}      
                        </div>
                    @endforeach
                @else
                  <p class="p-10 text-center">No hay comentario :o</p>
                @endif
                
            </div>
        </div>
      </div>

   </div>

@endsection
