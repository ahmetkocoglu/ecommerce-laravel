<?php

namespace App\Http\Services\Price;
use App\Models\Price;

class PriceService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Price::query()->create([
            'product_id' => $request['productId'],
            'price' => $request['price'],
            'discount_price' => $request['discountPrice'],
            'discount_rate' => $request['discountRate'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
