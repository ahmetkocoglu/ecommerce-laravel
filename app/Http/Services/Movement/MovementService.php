<?php

namespace App\Http\Services\Movement;
use App\Models\Movement;

class MovementService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Movement::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
