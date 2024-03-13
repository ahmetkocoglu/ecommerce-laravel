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
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
