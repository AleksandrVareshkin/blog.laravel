<x-app.layouts.main>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
        <label for="content">Content</label>
        <input type="text" name="content" value="{{ $post->content }}">
        <label for="tags">Tags</label>
        <select name="tags[]" multiple>
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{  $post->tags->contains($tag) ? 'selected' : '' }}>{{ $tag->title }}</option>
            @endforeach
        </select>
        <button type="submit">Send</button>
    </form>
</x-app.layouts.main>