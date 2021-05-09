<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function images(){
        return $this->hasMany('App\Models\ProductImage');
    }

    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }

//    public function colors(){
//        return $this->hasMany('App\Models\Color');
//    }
//    public function sizes(){
//     return $this->hasMany('App\Models\Size');
// }
protected $casts = [
    'size'=>'array',
    'color'=>'array'
];

}
