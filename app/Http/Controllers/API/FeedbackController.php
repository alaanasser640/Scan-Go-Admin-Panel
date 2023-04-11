<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator ;

class FeedbackController extends Controller
{
    use GeneralTrait;
    use GeneralTrait;
    // add contact
    public function Add(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'customer_id' => 'required',
            'message' => 'required',
           
        ]);
     
        if ($validator->fails()) {
            return $this->returnError("validation errors", $validator->errors(), 202);  
        }
        

       Feedback::create($request->all());
       return $this->returnSuccessMessage("message sent successfully", 200);
    }
}
