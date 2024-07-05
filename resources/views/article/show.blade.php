@extends('layouts.articleActions')

@section('title', 'Details')

@section('articleActions')


    <div class="mb-3">
        <div class="d-flex justify-content-end" >
            <a href="{{Route('article.edit', ['id' => $article->id])}}" class="btn btn-warning mx-2" title="edit article">
                <i class="bi bi-pencil-fill fs-5"></i>
            </a>

            </a>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$article->id}}">
                <i class="bi bi-trash-fill fs-5"></i>
            </a>
            @component('components.modal-delete', ['id' => 'deleteModal'.$article->id.'', 'label' => 'deleteModalLabel', 'title' => 'Delete', 'action' => $article->id, 'dataType' => "article"])
                <!-- Conteúdo do modal -->
                <p>Do you want to delete this?</p>

                @slot('footer')

                @endslot
            @endcomponent
            <!-- <form action="{{Route('article.destroy', ['id' => $article->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ml-2" title="delete article">
                    <i class="bi bi-trash-fill fs-5"></i>
                </button>
            </form> -->



        </div>
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" disabled readonly value="{{$article->title}}" aria-describedby="title">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Text</label>
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
                <label for="categorySelect">Category</label>
                <span>{{$category->name}}</span>
            </div>
        </div>
    </div>



@endsection
