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
            'product_id' => $request['productId'],
            'user_id' => $request['userId'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
