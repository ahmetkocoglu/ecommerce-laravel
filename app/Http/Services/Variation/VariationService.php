<?php

namespace App\Http\Services\Variation;
use App\Models\Variation;

class VariationService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Variation::query()->create([

            'title' => $request['title'],
            'seo' => $request['seo'],
            'product_id' => $request['productId'],
            'variation_id' => isset($request['variationId']) ? $request['variationId'] : null,
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
