<?php

namespace App\Http\Services\Rating;
use App\Models\Rating;

class RatingService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Rating::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
