<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'Category'     => $row[0],
            'SubCategory'    => $row[1], 
            'ProductName' => $row[2],
            'Brand'    => $row[3],
            'Price'    => $row[4],
            'Quantity'    => $row[5],
            'Discount'    => $row[6],
            'Discription'    => $row[7],
        ]);
    }
}
