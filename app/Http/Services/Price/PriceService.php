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
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
