<?php

namespace App\Http\Services\Content;
use App\Models\Content;

class ContentService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Content::query()->create([
            'title' => $request['title'],
            'slug' => isset($request['slug']) ? $request['slug'] : \Str::slug($request['title']),
            'description' => $request['description'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
