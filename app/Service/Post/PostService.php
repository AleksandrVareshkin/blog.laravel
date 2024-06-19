<?php

namespace App\Service\Post;

use App\Models\Post;
use App\Service\Tag\TagService;

class PostService
{
    private $tagService;

    /**
     * A description of the entire PHP function.
     *
     * @param TagService $tagService description
     *
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function getAllPosts($data)
    {
        $posts = Post::with('tags')->filters($data)->sort($data)->get();
        $tags = $this->tagService->getAllTags();
        return view('posts.index', ['posts' => $posts, 'tags' => $tags]);
    }

    public function getAdminPosts()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }


    public function editPost($post)
    {
        $tags = $this->tagService->getAllTags();

        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    public function createPost($postData)
    {
        $post = Post::create([
            'title' => $postData['title'],
            'content' => $postData['content'],
        ]);

        if (isset($postData['tags']) && is_array($postData['tags'])) {
            $post->tags()->sync($postData['tags']);
        }

        return $post;
    }


    public function updatePost($post, $postData)
    {
        if (isset($postData['tags'])) {
            $tags = $postData['tags'];
            unset($postData['tags']);
        }
        $post->update($postData);
        $post->tags()->sync($tags);
        return redirect()->back();
    }


    public function deletePost($post)
    {
        $post->delete();
    }
}
