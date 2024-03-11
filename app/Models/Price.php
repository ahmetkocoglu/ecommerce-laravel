<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $hidden = [
        'confirm',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
