<?php

namespace App\Http\Controllers;

use App\Address;
use Session;
use Illuminate\Http\Request;
use DB;

class AddressController extends Controller
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
    public function createAddress(Request $request)
    {
        $inputes = $request->input();
        try
        {
            $data = new Address();
            $data->userId =session::get('id');
            $data->name = $inputes['name'];
            $data->city = $inputes['city'];
            $data->state = $inputes['state'];
            $data->addressLine1 = $inputes['address1'];
            $data->addressLine2 = $inputes['address2'];
            $data->zipCode = $inputes['zipcode'];
            $data->contactNo = $inputes['contactNo'];
            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('/addressManage');
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
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function updateAddress(Request $request)
    {
        //
        $inputes = $request->input();
        $data = Address::find($inputes['id']);
       // $data = Address::find($inputes['id']);
        $data->name = $inputes['name'];
        $data->addressLine1 = $inputes['address1'];
        $data->addressLine2 = $inputes['address2'];
        $data->state = $inputes['state'];
        $data->city = $inputes['city'];
        $data->zipCode = $inputes['zipcode'];
        $data->contactNo = $inputes['contactNo'];


        $data->save();
        return redirect("/addressManage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroyAddress($id,Request $request)
    {
        $data = Address::find($id);
        $data->delete();

        return redirect("/addressManage");
    }
}
