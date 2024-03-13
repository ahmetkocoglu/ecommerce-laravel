<?php

namespace App\Http\Services\ProductCategory;
use App\Models\ProductCategory;

class ProductCategoryService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = ProductCategory::query()->create([
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
