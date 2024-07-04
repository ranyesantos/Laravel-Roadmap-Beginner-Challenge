@extends('layouts.app')

@section('title', 'Sobre')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <!-- Menu Lateral -->
            @include('components.sidebar')
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
