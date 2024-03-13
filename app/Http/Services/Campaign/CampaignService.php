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
            'title' => $request['title'],
            'seo' => \Str::slug($request['title']),
        ]);

        if(!$insert) return false;

        return $insert;
    }
}
