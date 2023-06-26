@extends('layouts.app')

@section('titulo')
    Inicia sesión en Devstagram UPV
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <!-- Utilizamos un asset el cual accede a una carpeta publica -->
            <img src="{{ asset('imagenes/login.jpg')}}" alt="Imagen Login de usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <!-- Formulario de registro -->
            <form method="POST" action="{{route('login')}}" novalidate>
                @csrf <!-- Genera un token de seguridad para validar el formulario-->
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">
                        {{session('mensaje')}}
                    </p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 black uppercase text-gray-500 font-bold">Email</label>
                    <input id="email" name="email" type="email" placeholder="Tu email de usuario" class="border p-3 w-full rounded tg
                        @error('email')
                            border-red-500
                        @enderror"
                        value="{{old('email')}}"
                    />
                    <!--Mostrar directiva de mensaje obligatorio-->
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 black uppercase text-gray-500 font-bold">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password de inicio" class="border p-3 w-full rounded tg
                        @error('password')
                            border-red-500
                        @enderror"
                    />
                    <!--Mostrar directiva de mensaje obligatorio-->
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                
                <!-- Check de mantener sesión iniciada-->
                <div class="mb-5"> 
                    <input type="checkbox" name="remember">
                    <label class="text-gray-600 text-sm">Mantener sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded tg">
            </form>
        </div>
    </div>
@endsection