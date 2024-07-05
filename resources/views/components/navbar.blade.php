<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Laravel Beginner Challenge</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="{{Route('blog.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{Route('blog.about')}}">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{Route('article.create')}}">New Article</a></li>
                        <li><a class="dropdown-item" href="{{Route('category.create')}}">Manage Categories</a></li>
                        <li><a class="dropdown-item" href="{{Route('tag.create')}}">Manage Tags</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
