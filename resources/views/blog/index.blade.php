@extends('layouts.app')

@section('title', 'Sobre')

@section('content')
    <div class="container">
        <h1>Homepage</h1>
        <p>Esta é a homepage.</p>
        <a href="{{Route('article.create')}}" type="button" class="btn btn-primary">Criar Artigo</a>
    </div>
@endsection
