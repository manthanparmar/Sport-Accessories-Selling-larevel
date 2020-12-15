<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Product;
use App\Cart;
use App\Address;
use Session;
use Illuminate\Http\Request;
use DB;


class OrdersController extends Controller
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
    public function create(Request $request)
    {
        //
        $inputes = $request->input();

        //echo $inputes['addresses'];

        $cartData = Cart::where('userId',Session::get('id'))->get();
        foreach($cartData as $cart)
        {
            $product = Product::where('id',$cart["productId"])->first();

            if($product->quantity < $cart->quantity)
            {
                $msg = $product['productName']." is out of stock.";
                // return error
                // return redirect("/viewCart",['error'=> ($product['productName']." is out of stock.")]);
                return redirect()->back()->with('error', $msg);
            }

            $total = ($cart->quantity * $product->price) - (($cart->quantity * $product->price * $product->discount) / 100);

            $data = new Orders();
            $data->userId = Session::get('id');
            $data->productId = $cart['productId'];
            $data->quantity = $cart['quantity'];   
            $data->total = $total;
            $data->paymentMethod = 'COD';
            $data->orderStatus = 'PENDING';
            $data->save();

            $product->quantity = $product->quantity - $cart['quantity'];
            $product->save();

            $cart->delete();
            
        }
       

        Session::put('cartCount','0');
        return redirect("/viewCart");


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
      

        $confirm = Orders::find($id);
        $confirm->orderStatus = "COMPLETED";
        $confirm->save();
        return redirect("/cpanel/manageOrder");
    }
    public function cancelled($id)
    {
      

        $confirm = Orders::find($id);
        $confirm->orderStatus = "CANCELLED";
        $confirm->save();
        return redirect("/cpanel/manageOrder");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
