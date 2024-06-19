<?php

namespace App\Http\Controllers;

use App\Models\Post;


use Illuminate\Http\Request;
use App\Service\Post\PostService;
use App\Service\Tag\TagService;

class PostController extends Controller
{
    /**
     * A description of the entire PHP function.
     *
     * @param PostService service for working with posts
     */
    private $service;

    /**
     * A description of the entire PHP function.
     *
     * @param TagService service for working with posts
     */
    private $tagService;

    /**
     * A description of the entire PHP function.
     *
     * @param TagService service for working with posts
     */
    public function __construct(PostService $service, TagService $tagService)
    {
        $this->service = $service;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $request->validate([
            'search' => 'nullable|string',
            'tags' => 'nullable|array',
        ]);
        return $this->service->getAllPosts($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = $this->tagService->getAllTags();
        return view('posts.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postData = $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'nullable'
            ]
        );
        $this->service->createPost($postData);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $tags = $this->tagService->getAllTags();
        return view('posts.show', [
            'id' => $id,
            'title' => $post->title,
            'content' => $post->content,
            'created_at' => $post->created_at,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return $this->service->editPost($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $postData = $request->validate(
            [
                'title' => 'required|max:255',
                'content' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'nullable'
            ]
        );
        return $this->service->updatePost($post, $postData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->service->deletePost($post);
        return redirect()->route('posts.admin');
    }
}
