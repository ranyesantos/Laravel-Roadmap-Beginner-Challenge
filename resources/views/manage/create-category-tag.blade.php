@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="container">

    @if ($dataType == "Categories")
        <form action="{{route('category.store')}}" method="POST">
            @csrf
    @elseif ($dataType == "Tags")
        <form action="{{route('tag.store')}}" method="POST">
            @csrf
    @endif
            <div class="d-flex flex-column align-items-center">
                <h3 class="mt-3">Add {{$dataType}}</h3>
                <div class="mb-3 col-5">
                    <label for="title" class="form-label">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" aria-describedby="title">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>

    <div class="d-flex flex-column align-items-center border-top" style="width: 100%;">
        <h3 class="mt-2">Existing {{$dataType}}</h3>
        @foreach ($data as $item)
            <div class="row col-6 d-flex justify-content-between align-items-center border-bottom pb-1">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-4">{{$item->name}}</span>
                    <div class="">
                        <a data-bs-toggle="collapse" href="#collapseEdit{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseEdit">
                            <i class="bi bi-pencil-fill fs-4"></i>
                        </a>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}">
                            <i class="bi bi-trash-fill fs-4 text-danger"></i>
                        </a>
                        @component('components.modal-delete', ['id' => 'deleteModal'.$item->id.'', 'label' => 'deleteModalLabel', 'title' => 'Delete', 'action' => $item->id, 'dataType' => $dataType])
                            <!-- Conteúdo do modal -->
                            <p>Do you want to delete this?</p>

                            @slot('footer')

                            @endslot
                        @endcomponent
                    </div>
                </div>
                <div class="collapse" id="collapseEdit{{$item->id}}">
                    @if ($dataType == "Categories")
                        <form action="{{route('category.update', ['id' => $item->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                    @elseif ($dataType == "Tags")
                        <form action="{{route('tag.update', ['id' => $item->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                    @endif
                            <label class="form-label" for="name">Edit Name</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="name" value="{{$item->name}}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        @endforeach
    </div>



</div>
