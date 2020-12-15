<?php

namespace App\Http\Controllers;
use App\feedback;
use Illuminate\Http\Request;
use DB;

class feedbackController extends Controller
{
    //
    public function createFeedback(Request $request)
    {
        //
        $inputes = $request->input();
        try
        {
            $data = new feedback();
            $data->name = $inputes['name'];
            $data->phone = $inputes['phone'];
            $data->email = $inputes['email'];
            $data->message = $inputes['message'];
            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('/contactus');

    }
}
