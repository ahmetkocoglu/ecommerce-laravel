<?php

namespace App\Http\Services\Coupon;
use App\Models\Coupon;

class CouponService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Coupon::query()->create([
            'user_id' => $request['userId'],
            'code' => $request['code'],
            'title' => $request['title'],
            'description' => $request['description'],
            'type' => $request['type'],
            'price' => $request['price'],
            'start_date' => $request['startDate'],
            'end_date' => $request['endDate'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
