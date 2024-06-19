<?php

namespace App\Service\Tag;

use App\Models\Tag;

class TagService
{
    public function getAllTags()
    {
        return Tag::all();
    }

    public function createTag($title)
    {
        return Tag::create(['title' => $title]);
    }
}
