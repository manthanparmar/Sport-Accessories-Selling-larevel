<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Brand;
use App\Product;
use App\UserData;
use App\Cart;
use App\Address;
use App\Orders;
use DB;
use Session;
use Illuminate\Http\Request;

class PageCallerController extends Controller
{
    //

    public function CallHome(Request $request)
    {
        $products = Product::get();
        $subCategories = SubCategory::get();
        return view('pages.home',['request'=>$request,'products'=>$products,'subCategories'=>$subCategories]);
    }
    public function CallAdminLayout(Request $request)
    {
        return view('layout.adminLayout',['request'=>$request]);
    }

    public function CallLogin(Request $request)
    {
        return view('pages.login',['request'=>$request]);
    }

    public function CallRegister(Request $request)
    {
        return view('pages.register',['request'=>$request]);
    }

    public function CallContactUs(Request $request)
    {
        return view('pages.contactUs',['request'=>$request]);
    }
    public function CallAboutUs(Request $request)
    {
        return view('pages.aboutUs',['request'=>$request]);
    }
   
    public function CallInsertProduct(Request $request)
    {
        $subCategories = SubCategory::get();
        $categories = Category::get();
        $brands = Brand::get();
      //  $products = Product::get();

        $products = DB::select(DB::raw("SELECT * from product p inner join subcategory c on c.id = p.subCategoryId"));
        
        return view('pages.insertProduct',['request'=>$request,'products'=>$products,'subCategories'=>$subCategories,'category'=>$categories,'brands'=>$brands]);
    } 
    public function CallViewProduct($id,Request $request)
    {
        $data = Product::find($id);
        $products = Product::where('id','!=',$id)->take(3)->get();
        return view('pages.viewProduct',['request'=>$request,'pro'=>$data,'products'=>$products]);
    }  
    public function CallViewCategoryProduct(Request $request)
    {
       
        $id = $request->input('catId');

        if(isset($id))
        {


            $categoryProduct=Product::where('categoryId',$id)->get();
            return view('pages.viewCategoryProduct',['request'=>$request,'categoryProduct'=>$categoryProduct]);
    
        }
        else
        {
           $inputes = $request->input();
            $subCategoryId=$inputes['subcategoryId'] ?? 'NULL';
          $query="SELECT * FROM product p WHERE ("
          . $subCategoryId ." IS NULL OR p.subCategoryId = "
          . $subCategoryId .") AND ('" .$inputes['search'] . "' IS NULL OR p.productName LIKE '%" . $inputes['search'] ."%')";
            $categoryProduct = DB::select(DB::raw($query));
          
            return view('pages.viewCategoryProduct',['request'=>$request,'categoryProduct'=>$categoryProduct]);
 
        }
        
           }

    public function CallCreateCategory(Request $request)
    {
        $categories = Category::get();
        //echo $categories;
        return view('pages.category',['request'=>$request,'categories'=>$categories]);
    }
    public function CallCreateSubCategory(Request $request)
    {
       // $subCategories = SubCategory::get();
        //$categories = Category::get();
        $categories = DB::select(DB::raw("SELECT * from SubCategory sc inner join Category c on c.id = sc.categoryId"));
        
        
        return view('pages.subcategory',['request'=>$request,'categories'=>$categories]);
    }
    public function CallBrand(Request $request)
    {
        $brands = Brand::get();
        return view('pages.brand',['request'=>$request,'brands'=>$brands]);
    }
    public function CallManageUser(Request $request)
    {       
        $users= UserData::get();
        return view('pages.manageUser',['request'=>$request,'users'=>$users]);
    }
    public function CallMyProfile(Request $request)
    {
        return view('pages.myProfile',['request'=>$request]);
    }
    public function CallViewCart(Request $request)
    {
        
        $cartProduct = DB::select(DB::raw("SELECT c.id,c.quantity,c.userId,c.productId,p.price,p.discount,c.quantity,p.description,p.productName,p.image1,p.isActive from cart c
        INNER JOIN product p on c.productId = p.id and c.userId =". session::get('id')));
        $address = Address::where('userId',session::get('id'))->get();
    
        return view('pages.viewCart',['request'=>$request,'cartProduct'=>$cartProduct,'address'=>$address]);
    }

    public function CallAddress(Request $request)
    {
        $address = Address::where('userId',session::get('id'))->get();
        return view('pages.address',['request'=>$request,'address'=>$address]);
    }
    public function CallCheckOut(Request $request)
    {
       // $address = Address::get();
        return view('pages.checkOut',['request'=>$request]);
    }

    public function CallManageOrder(Request $request)
    {
    
        $mainQuery = "SELECT o.id,o.total,o.paymentMethod,o.orderStatus,p.productName,
        u.firstName,u.lastName,o.quantity FROM orders O ";

        $mainQuery = $mainQuery . " INNER JOIN product P ON P.id = O.productId 
        INNER JOIN users U ON U.id = O.userId";

        if(isset($_GET['status']))
        {
            $mainQuery = $mainQuery . " WHERE O.orderStatus = '".$_GET['status'] . "' ";
        }

         $manageOrder = DB::select(DB::raw($mainQuery));
        return view('pages.manageOrder',['request'=>$request,'manageOrder'=>$manageOrder]);
    }

    public function CallMyOrders(Request $request)
    {
        $myOrders= DB::select(DB::raw("SELECT o.id,o.total,o.orderStatus,p.productName,p.image1, p.discount,p.price,o.quantity
                    FROM orders O 
                    INNER JOIN product P ON P.id = O.productId 
                    INNER JOIN users U ON U.id = O.userId WHERE u.id=".session::get('id')));
        return view('pages.myOrders',['request'=>$request,'myOrders'=>$myOrders]);
    }
    public function CallForgotPassword(Request $request)
    {
       
        return view('pages.forgotPassword',['request'=>$request]);
    }
    public function CallChangePassword(Request $request)
    {
       
        return view('pages.changePassword',['request'=>$request]);
    }
   
}
