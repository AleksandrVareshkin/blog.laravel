<x-app.layouts.main title="View single post">
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                </div>

                <div class="col">
                    <div class="card-body">
                        <p class="card-text">{{$title}}</p>
                        <p class="card-text">{{$content}}</p>
                        @foreach($tags as $tag)
                            <li>{{ $tag->title }}</li>
                        @endforeach
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-body-secondary">Created at: {{ $created_at }}</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app.layouts.main>
