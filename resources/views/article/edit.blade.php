
@extends('layouts.articleActions')

@section('title', 'Edit Article')

@section('articleActions')

    <form action="{{route('article.update', ['id' => $article->id])}}" method="POST">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$article->title}}" aria-describedby="title">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" name="text" rows="3">{{$article->text}}</textarea>
        </div>
        <div class="d-flex flex-wrap justify-content-between">
            <div class="me-5 d-flex flex-wrap">
                <label class="w-100">Tags</label>
                @foreach ($articleTags as $articleTag)
                    <div class="form-check me-2">

                        <label class="form-check-label" for="tags">
                            {{$articleTag->name}}
                        </label>
                        <input class="form-check-input" type="checkbox" checked value="{{$articleTag->id}}" name="tags[]">

                    </div>
                @endforeach

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
                        <option selected>{{$articleCategory->name}}</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>

    </form>
@endsection
