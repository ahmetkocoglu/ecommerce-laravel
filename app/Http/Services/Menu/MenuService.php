<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;

class MenuService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Menu::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
