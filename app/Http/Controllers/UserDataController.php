<?php

namespace App\Http\Controllers;

use App\UserData;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;


class UserDataController extends Controller
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
        $inputes = $request->input();
        try
        {
            $data = new UserData();
            $data->firstName = $inputes['fname'];
            $data->lastName = $inputes['lname'];
            $data->email = $inputes['email'];
            $data->password = $inputes['password'];
            $data->contactNo = '';
            $data->userType = 'USER';
            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('/login');
        //
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
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function show(UserData $userData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $inputes = $request->input();

        $userData = UserData::find(Session::get('id'));

       if($inputes['oldPassword'] != $userData->password)
       {
        return redirect('/changepassword')->with('alert', 'Old Password incorrect!!!');
       
       }
       else{
         $userData->password = $inputes['newPassword'];
         $userData->save();
         return redirect("/myProfile");
       }

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function updateUserData(Request $request)
    {
        $inputes = $request->input();

        $userData = UserData::find(Session::get('id'));
        $userData->firstName = $inputes['fname'];
        $userData->lastName = $inputes['lname'];
        $userData->email = $inputes['email'];
        $userData->contactNo = $inputes['contactNo'];

        

        $userData->save();
            
                Session::put('firstName', $userData->firstName);
                Session::put('lastName', $userData->lastName);
                Session::put('email', $userData->email);
                Session::put('userType', $userData->userType);
                Session::put('contactNo', $userData->contactNo);
        return redirect("/myProfile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function makeAdmin($id)
    {
        $makeAdmin = UserData::find($id);
        $makeAdmin->userType = "ADMIN";
        $makeAdmin->save();
        return redirect("/cpanel/users");
    }
    public function makeUser($id)
    {
        $makeAdmin = UserData::find($id);
        $makeAdmin->userType = "USER";
        $makeAdmin->save();
        return redirect("/cpanel/users");
    }


    public function login(Request $request)
    {
        

        $inputes = $request->input();
        try
        {
            $email = $inputes['email'];
            $password = $inputes['password'];
            
            $isAvailable = UserData::where('email',$email)->where('password',$password)->count();

            if($isAvailable > 0)
            {
                $user = UserData::where('email',$email)->where('password',$password)->first();
         
                Session::put('id', $user->id);
                Session::put('firstName', $user->firstName);
                Session::put('lastName', $user->lastName);
                Session::put('email', $user->email);
                Session::put('userType', $user->userType);
                Session::put('contactNo', $user->contactNo);

                $cartCount = Cart::where('userId',$user->id)->count();

                Session::put('cartCount',$cartCount);
          
               return redirect('/');
            }
            else
            {
                //echo "<script language='javascript'>alert('UserName Or Password incorrect!!!');</script>";
                return redirect('/login')->with('alert', 'UserName Or Password incorrect!!!');
            }

        }
        catch(Exception $e)
        {

        }

        
        
    }
    public function logout(Request $request)
    {

            Session::flush();
                          
        return redirect('/login');
    }
}
