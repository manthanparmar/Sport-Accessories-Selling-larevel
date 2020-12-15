<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    public $timestamps = true;
    protected $fillable = ['userId','name','city','state','addressLine1','addressLine2','zipCode','contactNo'];
}
