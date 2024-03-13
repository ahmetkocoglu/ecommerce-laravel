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
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
