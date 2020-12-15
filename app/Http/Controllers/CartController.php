<?php

namespace App\Http\Controllers;

use App\Cart;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
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
        try
        {

            $cart = Cart::where('userId',Session::get('id'))->where('productId',$inputes['productId'])->first();
           
            if(!isset($cart))
            {
                $data = new Cart();
                $data->userId = Session::get('id');
                $data->productId = $inputes['productId'];
                $data->quantity = $inputes['quantity'];   
                $data->save();

                $cartCount = Cart::where('userId',Session::get('id'))->count();

                Session::put('cartCount',$cartCount);
            }
            else
            {
                $cart->quantity = $cart->quantity + $inputes['quantity'];
                $cart->save();
            }
        }
        catch(Exception $e)
        {

        }
    return redirect('viewProduct/'.$inputes['productId']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroyCart($id,Request $request)
    {
        $cart = Cart::find($id);
        $cart->delete();

        $cartCount = Cart::where('userId',Session::get('id'))->count();

        Session::put('cartCount',$cartCount);

        return redirect("/viewCart");
    }
}
