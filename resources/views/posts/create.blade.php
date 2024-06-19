<x-app.layouts.main title="Create new post">

    <body>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf

            <label for="title">Title</label>
            <input type="text" name="title">
            <label for="content">Content</label>
            <input type="text" name="content">

            <label for="tags">Tags</label>
            <select name="tags[]" multiple>
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            <button type="submit">Send</button>
        </form>
    </body>

</x-app.layouts.main>