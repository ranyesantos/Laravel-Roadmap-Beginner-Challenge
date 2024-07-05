@extends('layouts.articleActions')

@section('title','New Article')

@section('articleActions')

    <div class="container">

        <form action="{{route('article.store')}}" method="POST">
        @csrf
        <h1 class="text-center mt-3" >New Article</h1>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" aria-describedby="title">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <div class="w-100 d-flex justify-content-center">
                <div class="me-5 d-flex flex-wrap w-70">
                    <label for="tags" class="w-100">Tags</label>
                    @foreach ($tags as $tag)
                        <div class="form-check me-2">

                            <label class="form-check-label" for="tags">
                                {{$tag->name}}
                            </label>
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]">

                        </div>
                    @endforeach
                </div>

                <div class="w-50 d-flex justify-content-end">
                    <div>
                        <label for="categorySelect">Category</label>
                        <select class="form-select" name="category_id" aria-label="categories">
                            <option selected>Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Finish</button>
        </form>
    </div>

@endsection
