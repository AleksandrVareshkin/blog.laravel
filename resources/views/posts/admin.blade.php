<x-app.layouts.main title="Admin">
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="shadow-sm p-3 mb-5 bg-body rounded">
                <a href="{{route('posts.create')}}" class="btn btn-sm btn-outline-secondary">Create Post</a>
                <a href="{{route('tags.create')}}" class="btn btn-sm btn-outline-secondary">Create Tag</a>
            </div>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text">{{$post->title}}</p>
                            <p class="card-text">{{$post->content}}</p>
                            <ul>
                                @foreach($post->tags as $tag)
                                <li>{{ $tag->title }}</li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                </form>
                                <small class="text-body-secondary">Created at: {{ $post->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="shadow-sm p-3 mb-5 bg-body rounded">
                        @foreach ($tags as $tag)
                        <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-sm btn-outline-secondary">{{$tag->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app.layouts.main>