<div class="col-md-2">
    <div class="p-2" style="position: absolute; width: 12%;">
        <h5>Categories</h5>
        <ul class="nav flex-column">
            @if (count($categories) > 0)
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home.category', ['id' => $category->id])}}">{{$category->name}}</a>
                    </li>
                @endforeach
            @else
                <p class="mx-2 fs-5" >empty</p>
            @endif
        </ul>

        <h5>Tags</h5>
        <ul class="nav flex-column">

        @if (count($tags) > 0)
            @foreach ($tags as $tag)
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('home.tag', ['id' => $tag->id])}}">{{$tag->name}}</a>
                </li>
            @endforeach
        @else
            <p class="mx-2 fs-5" >empty</p>
        @endif

        </ul>
    </div>
</div>
