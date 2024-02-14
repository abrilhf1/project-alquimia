@extends('layouts.mainError')
@section('title', 'Error 404')
@section('main')

    <section class="paginaError">
        <h1>¡Ups! Ocurrió un error inesperado.</h1>
        <p>En este momento la página que queres acceder
            no se encuentra disponible, te recomendamos leer nuestra sección de blog o si deseas volver a la home también
            podés hacerlo. </p>
        <a href="{{route('blog.index')}}" class="btn">Blog</a>
        <a href="{{route('home')}}" class="btn">Home</a>
    </section>

@endsection
