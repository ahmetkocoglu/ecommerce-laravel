<?php

namespace App\Http\Services\Campaign;
use App\Models\Campaign;

class CampaignService
{
    /**
     * @throws Exception
     */
    public static function store(array $request)
    {
        $insert = Campaign::query()->create([
            'product_id' => $request['productId'],
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
