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
            'product_id' => $request['productId'],
            'category_id' => $request['categoryId'],
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
