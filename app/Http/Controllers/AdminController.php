<?php

namespace App\Http\Controllers;


use App\Service\Post\PostService;
use App\Service\Tag\TagService;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * A description of the entire PHP function.
     *
     * @param PostService service for working with posts
     */
    private $postService;

    /**
     * A description of the entire PHP function.
     *
     * @param TagService service for working with posts
     */
    private $tagService;

    public function __construct(PostService $postService, TagService $tagService)
    {
        $this->postService = $postService;
        $this->tagService = $tagService;
    }
    /**
     * adminIndex function retrieves admin posts and returns the admin posts view.
     */
    public function adminIndex()
    {
        $posts = $this->postService->getAdminPosts();
        $tags = $this->tagService->getAllTags();

        return view('posts.admin', [
            'posts' => $posts,
            'tags' => $tags
        ]);
    }
}
