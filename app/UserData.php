<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //
    protected $table = 'users';

    public $timestamps = true;
    protected $fillable = ['firstName','lastName','email','password','contactNo','userType'];


}
