<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function price(){
        return $this->hasOne(Price::class)->select(['product_id', 'price']);
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }

    public function variation(){
        return $this->hasMany(Variation::class);
    }

    public function campaign(){
        return $this->hasMany(Campaign::class);
    }

    public function favorite(){
        return $this->hasMany(Favorite::class);
    }

    public function productCategory(){
        return $this->hasMany(ProductCategory::class);
    }
}
