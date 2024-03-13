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
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
