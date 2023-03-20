<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use GeneralTrait;

    public function Add(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'message' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);
     
        if ($validator->fails()) {
            return $this->returnError("validation errors", $validator->errors(), 202);  
        }

       Contact::create($request->all());
       return $this->returnSuccessMessage("message sent successfully", 200);
    }

}
