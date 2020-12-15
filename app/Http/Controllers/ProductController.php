<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Brand;
use DB;
use File;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProduct(Request $request)
    {
        //
        $inputes = $request->input();
        try
        {
            $data = new Product();
            $file1 = $request->file('image1');  
            $name1=$file1->getClientOriginalName();  
            $file1->move('UplodedData\ProductImage',$name1);
            $data->image1 = $name1;

            $file2 = $request->file('image2');  
            $name2=$file2->getClientOriginalName();  
            $file2->move('UplodedData\ProductImage',$name2);
            $data->image2 = $name2;

            $file3 = $request->file('image3');  
            $name3=$file3->getClientOriginalName();  
            $file3->move('UplodedData\ProductImage',$name3);
            $data->image3 = $name3;
        

           
            $data->categoryId = $inputes['categoryId'];
            $data->subCategoryId = $inputes['subCategoryId'];
            $data->productName = $inputes['productName'];
            $data->brandId = $inputes['brandId'];
            $data->price = $inputes['price'];
            $data->quantity = $inputes['quantity'];
            $data->discount = $inputes['discount'];
            $data->description = $inputes['description'];
            $data->isActive = true;
            
            

            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('cpanel/product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UploadProductFile(Request $request)
    {
        
       $array = Excel::toArray([],$request->file('productFile'));
       $i=0;
      
        
        foreach($array[0] as $row){
            if($i == 0)
            {
               
            }
            else{
                
            $category = Category::where('categryName',$row[0])->first();
                $subCategory = SubCategory::where('subCategryName',$row[1])->first();
                $brand = Brand::where('brandName',$row[3])->first();
         
            $data = new Product();
            $data->categoryId = $category->id;
            $data->subCategoryId =$subCategory->id;
            $data->productName = $row[2];    
            $data->brandId = $brand->id;
            $data->price = $row[4];
            $data->quantity = $row[5];
            $data->discount = $row[6];
            $data->description = $row[7];
            $data->image1 = $row[8];
            $data->image2 = $row[9];
            $data->image3 = $row[10];

            $data->isActive = true;

            //Storage::copy('E:\imageAsset\\'.$row[8], 'UplodedData\ProductImage\\'.$row[8]);
            $data->save();
            }
            $i=$i+1;
       }
       return redirect("/cpanel/product");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        //
        $inputes = $request->input();
        $data = Product::find($inputes['id']);

        if($request->has('image1'))
        {

            if(File::exists("UplodedData\ProductImage\\".$data->image1))
            {
                File::delete("UplodedData\ProductImage\\".$data->image1);
            }

            $file1 = $request->file('image1');  
            $name1=$file1->getClientOriginalName();  
            $file1->move('UplodedData\ProductImage',$name1);
            $data->image1 = $name1;
        }
       
        if($request->has('image2'))
        {

            if(File::exists("UplodedData\ProductImage\\".$data->image2))
            {
                File::delete("UplodedData\ProductImage\\".$data->image2);
            }


            $file2 = $request->file('image2');  
            $name2=$file2->getClientOriginalName();  
            $file2->move('UplodedData\ProductImage',$name2);
            $data->image2 = $name2;
        }

        if($request->has('image3'))
        {

            if(File::exists("UplodedData\ProductImage\\".$data->image3))
            {
                File::delete("UplodedData\ProductImage\\".$data->image3);
            }


            $file3 = $request->file('image3');  
            $name3=$file3->getClientOriginalName();  
            $file3->move('UplodedData\ProductImage',$name3);
            $data->image3 = $name3;
        }        

           
            $data->categoryId = $inputes['categoryId'];
            $data->subCategoryId = $inputes['subCategoryId'];
            $data->productName = $inputes['productName'];
            $data->brandId = $inputes['brandId'];
            $data->quantity = $inputes['quantity'];
            $data->price = $inputes['price'];
            $data->discount = $inputes['discount'];
            $data->description = $inputes['description'];
            $data->isActive = true;
            $data->save();

            return redirect("/cpanel/product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id,Product $product)
    {
        //
        $product = Product::find($id);
        $product->delete();

        return redirect("/cpanel/product");
    }
}
