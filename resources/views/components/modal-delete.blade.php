<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        @if ($dataType == "Categories")
            <form action="{{route('category.destroy', ['id' => $action ])}}" method="POST">
                @csrf
                @method('DELETE')
        @elseif ($dataType == "Tags")
            <form action="{{route('tag.destroy', ['id' => $action ])}}" method="POST">
                @csrf
                @method('DELETE')
        @elseif ($dataType == "article")
            <form action="{{route('article.destroy', ['id' => $action ])}}" method="POST">
                @csrf
                @method('DELETE')
        @endif
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
      </div>
    </div>
  </div>
</div>

