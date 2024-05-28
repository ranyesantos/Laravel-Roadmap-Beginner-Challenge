@extends('layouts.app')

@section('title', 'Sobre')

@section('content')
    <a href="{{Route('article.create')}}" type="button" class="btn btn-primary">Criar Artigo</a>
    <div class="container-fluid">
        <div class="row">
            <!-- Menu Lateral -->
            <div class="col-md-2">
                <div class="p-2" style="position: absolute; width: 15%;">
                    <h4>Menu</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 4</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="col-md-8">
                <div class="container">
                    <div class="d-flex flex-column align-items-center">
                        @foreach ($articles as $article)
                            <div class="card mt-3 w-100" style="max-width: 28rem;">
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
