<?php

namespace App\Http\Controllers;
use App\Brand;
use File;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function createBrand(Request $request)
    {
        //
       
        $inputes = $request->input();
        try
        {

            $file = $request->file('brandLogo');  
            $name=$file->getClientOriginalName();  
            $file->move('UplodedData\BrandLogos',$name);
       
            $data = new Brand();
            $data->brandName = $inputes['brandName'];
            $data->logo = $name;
            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('cpanel/brand');

    }

    public function updateBrand(Request $request)
    {
   
        $inputes = $request->input();

        $brand = Brand::find($inputes['id']);
        //
        if($request->has('brandLogo'))
        {

            if(File::exists("UplodedData\BrandLogos\\".$brand->logo))
            {
                File::delete("UplodedData\BrandLogos\\".$brand->logo);
            }

            $file = $request->file('brandLogo');  
            $name=$file->getClientOriginalName();  
            $file->move('UplodedData\BrandLogos',$name);
            $brand->logo = $name;
        }
         $brand->brandName = $inputes['brandName'];
   

        $brand->save();
        return redirect("/cpanel/brand");
    }
    public function destroyBrand($id,Request $request)
    {
        //
         $brand = Brand::find($id);
         $brand->delete();

         return redirect("/cpanel/brand");
    }
}
