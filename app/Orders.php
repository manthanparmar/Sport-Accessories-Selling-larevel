<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';

    public $timestamps = true;
    protected $fillable = ['userId','productId','quantity','total','paymentMethod','orderStatus'];
}
