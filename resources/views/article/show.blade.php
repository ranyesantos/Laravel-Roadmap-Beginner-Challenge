@extends('layouts.app')

@section('title', 'Detalhes')

@section('content')
<div class="container">

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" name="title" disabled readonly value="{{$article->title}}" aria-describedby="title">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Texto</label>
        <textarea class="form-control" name="text" disabled readonly rows="3">{{$article->text}}</textarea>
    </div>
    <div class="d-flex flex-wrap justify-content-between">
        <div class="me-5 d-flex flex-wrap">
            <label class="w-100">Tags</label>
            @foreach ($tags as $tag)
                <div class="form-check me-2">

                    <label for="tags">
                        {{$tag}}
                    </label>

                </div>
            @endforeach
        </div>

        <div class="w-50 d-flex justify-content-end">
            <div class="row">
                <label for="categorySelect">Categoria</label>
                <span>{{$category->name}}</span>
            </div>
        </div>
    </div>


</div>

@endsection
