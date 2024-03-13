<?php

namespace App\Http\Services\Comment;
use App\Models\Comment;

class CommentService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Comment::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
