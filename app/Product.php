<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';

    public $timestamps = true;
    protected $fillable = ['categoryId','subCategoryId','productName','companyId','price','discount','quantity','description','image1','image2','image3','isActive'];
}
