<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    //
    protected $table = 'feedback';

    public $timestamps = true;
    protected $fillable = ['name','email','phone','message'];
}
