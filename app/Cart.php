<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart';

    public $timestamps = true;
    protected $fillable = ['userId','productId','quantity'];

}
