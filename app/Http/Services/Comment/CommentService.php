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
            'product_id' => $request['productId'],
            'user_id' => $request['userId'],
            'comment' => $request['comment'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
