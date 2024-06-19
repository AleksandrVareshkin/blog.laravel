<x-app.layouts.main title="Create new tag">
    <body>
        <form action="{{ route('tags.store') }}" method="post">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title">
            <button type="submit">Send</button>
        </form>
    </body>
</x-app.layouts.main>