<?php

namespace App\Http\Services\User;
use App\Models\User;

class UserService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = User::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
