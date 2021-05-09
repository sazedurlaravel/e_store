<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }
    public function order_item(){
        return $this->belongsTo('App\Models\OrderItem');
    }
}
