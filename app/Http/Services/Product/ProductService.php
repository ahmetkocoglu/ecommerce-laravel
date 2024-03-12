<?php

namespace App\Http\Services\Product;
use App\Models\Product;

class ProductService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Product::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
