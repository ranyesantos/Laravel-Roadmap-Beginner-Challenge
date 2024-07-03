@extends('layouts.app')

@section('title', 'Sobre')

@section('content')
    <div class="container-fluid">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-plus-circle"></i>
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{Route('article.create')}}">Novo Artigo</a></li>
                    <li><a class="dropdown-item" href="{{Route('category.create')}}">Manage Categories</a></li>
                    <li><a class="dropdown-item" href="#">Manage Tags</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- Menu Lateral -->
            <div class="col-md-2">
                <div class="p-2" style="position: absolute; width: 12%;">
                    <h5>Categorias</h5>
                    <ul class="nav flex-column">
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('home.category', ['id' => $category->id])}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <h5>Tags</h5>
                    <ul class="nav flex-column">

                        @foreach ($tags as $tag)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('home.tag', ['id' => $tag->id])}}">{{$tag->name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="col-md-8">

                <div class="container">
                    <div class="d-flex flex-column align-items-center">
                    <h1>{{$title}}</h1>
                        @foreach ($articles as $article)
                            <div class="card mt-3 w-100" style="max-width: 48rem;">
                                <a href="{{route('article.show', ['id' => $article->id])}}" style="text-decoration: none; color: inherit;">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $article->title }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
