<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'confirm',
        'created_at',
        'updated_at',
        'deleted_at',
        'menu_id'
    ];

    protected $casts = [
        'request_date' => 'datetime:Y-m-d H:i:s',
    ];

    //Add extra attribute
    protected $attributes = ['menu'];

    //Make it available in the json response
    protected $appends = ['menu'];

    //implement the attribute
    public function getMenuAttribute()
    {
        return $this->menu_id;
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, 'menu_id', 'id')->with('subSubMenu');
    }

    public function subSubMenu()
    {
        return $this->hasMany(Menu::class, 'menu_id', 'id');
    }
}
