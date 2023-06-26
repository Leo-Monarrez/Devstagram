<!--Resive todo de el layout app-->
@extends('layouts.app')
<!--Enviar Titulo al contenedor dinamico de app-->
@section('titulo')
    About me
@endsection
<!--Enviar Contenido al contenedor dinamico de app-->
@section('contenido')

    <div class="perfil">
        <div class="head">
            <div class="profile-photo">
                <img src="imagenes/profile.jpg">
            </div>
            <h3>Circe Leonarda Monarrez Cruz/h3>
            <p>Soy estudiante de la carrera Tecnologías de 
                la información en la Universidad Politécnica
                de Victoria, la verdad siempre estoy ocupada con algo
                aunque la verdad, me gusta mucho la jardineria y crear.
            </p>
        </div>
        <div class="datos-curriculares">
            <div class="left"> <!--Columna izquierda-->
                <div class="datos-habilidades">
                    <h2>Habilidades</h2>
                    <ul class="datos">
                        <li>Musicales</li>
                        <li>Rusticos</li>
                        <li>Cocina</li>
                        <li>Medalla de participacion en ciclismo</li>
                        <li>Medalla de oro de judo</li>
                       
                    </ul>
                </div>  
            </div>
            <div class="right"> <!--Columna derecha-->
                <div class="datos-cursos">
                    <h2>Cursos hechos por mi</h2>
                    <ul class="datos">
                        <li>Curso de artes</li>
                        <li>Curso de musica</li>
                        <li>Curso de barro</li>
                        <li>Curso Introduction to Cybersecurity</li>
                        <li>Curso basico de Teoria del color</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>                     

@endsection