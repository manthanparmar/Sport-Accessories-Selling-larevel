<?php

namespace App\Http\Controllers;
use Mail;
use App\userData;
use App\Mail\Mailer;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    //
    public function forgotPassword(Request $request)
    {
    
         $inputes = $request->input();
         $userdata = UserData::where('email',$inputes['forgotpPasswordEmail'])->get()->first();

        if(!isset($userdata))
        {
            return redirect('/forgotpassword')->with('alert', "This Email doesn't exist !! please check email.. ");
       
        } 
        
         $rendomPassword = rand(9999999,999999999);
         $userdata->password =$rendomPassword;
         $userdata->save();
         $details = [
	    	'to' => $inputes['forgotpPasswordEmail'],
	    	'from' => "sportaccessoriesmail@gmail.com",
	    	'subject' => "Forgot Pasword",
	        'title' => "Forgot Password",
            "name" 	=> $userdata->lastName,
            "password" => $rendomPassword
	    ];
   
    	echo Mail::to($inputes['forgotpPasswordEmail'])->send(new \App\Mail\Mailer($details));

    //    $userdata = UserData::where('email',$inputes['forgotpPasswordEmail']->get())->update(['password'=>$password]);
    //    $userData->password = $inputes['newPassword'];
      //  $userData->save();
         return redirect("/");
    }
}
