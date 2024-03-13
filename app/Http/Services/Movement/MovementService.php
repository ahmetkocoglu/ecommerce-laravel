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
            'product_id' => $request['productId'],
            'user_id' => $request['userId'],
            'process_type' => $request['processType'],
            'price' => $request['price'],
            'discountPrice' => $request['discountPrice'],
            'quantity' => $request['quantity'],
            'tax' => $request['tax'],
            'total' => $request['total'],
            'description' => $request['description'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
