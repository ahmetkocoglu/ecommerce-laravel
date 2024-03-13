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
            'product_id' => $request['productId'],
            'user_id' => $request['userId'],
            'rating' => $request['rating'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
