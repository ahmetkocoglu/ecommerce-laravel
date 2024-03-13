<?php

namespace App\Http\Services\Category;
use App\Models\Category;

class CategoryService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Category::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
