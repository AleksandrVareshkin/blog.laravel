<x-app.layouts.main title="Posts">
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <form action="{{route('posts.index')}}" method="get">
                    <input type="text" name="search" placeholder="Search by title">
                    <select class="form-select" name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <button type="submit">Filter</button>
                    </div>
                </form>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)
                    <a href="{{route('posts.show', $post->id)}}">
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                     preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
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
                                        <small class="text-body-secondary">Created at: {{ $post->created_at }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app.layouts.main>
