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
            'seo' => isset($request['seo']) ? $request['seo'] : \Str::slug($request['title']),
            'menu_id' => $request['menuId'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
