<?php

namespace App\Http\Services\Favorite;
use App\Models\Favorite;

class FavoriteService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Favorite::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
