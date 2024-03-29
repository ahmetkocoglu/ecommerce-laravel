<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    protected $casts = [
        'updated_at' => "datetime:Y-m-d"
    ];

    public function price(){
        return $this->hasOne(Price::class);
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }

    public function variation(){
        return $this->hasMany(Variation::class)->with('subVariation');
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

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
