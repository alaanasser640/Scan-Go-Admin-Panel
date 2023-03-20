<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\GeneralTrait;

class SignupController extends Controller
{
    use GeneralTrait;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|string|email',
            'password' => 'required'
        ]);
        
        if ($validator->fails()) {
            return $this->returnError("validation errors", $validator->errors(), 202);
           
        }

        $user = Customer::firstWhere('email', $request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->returnError("login error", "this user is not authenticated", 202);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $data = [
            'user' => $user,
            'token' => $token
        ];
        return $this->returnData("customer data", $data, "login successfully", 200);
        
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|',
            'email' => 'required|string|email|unique:customers',
            'password' => 'required',
            'phone_number' => 'required|min:11|unique:customers',
            'image' => 'mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($validator->fails()) {
            return $this->returnError("validation errors", $validator->errors(), 202);
        }
        try {
            $checkUser = Customer::firstWhere('email', $request->email);
            if ($checkUser) {
                return $this->returnError("validation errors", 'this email is already taken', 202);
 
            }
            $checkPhone = Customer::firstWhere('phone_number', $request->phone_number);
            if ($checkPhone) {
                return $this->returnError("validation errors", 'this phone number is already taken', 202);
            }
            Customer::create([
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);
            return $this->returnSuccessMessage("registerd successfully", 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 201);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
       
        return $this->returnSuccessMessage("user logged out successfully", 200);

        

    }
    public function deleteAccount(Request $request)
    {
        $user = Customer::firstWhere('email', $request->email);
        if($user)
        {
            $user->delete();
            return $this->returnSuccessMessage("Acconut deleted successfully", 200);
        }
        else{
            return $this->returnError("validation errors", 'this user is not existed', 401);
        }
        
    }
    public function updateProfile(Request $request)
    {
        
        $request->validate([
            'user_name' => 'required|string',
            'phone_number'=> 'required',
            'image' => 'nullable',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable',
        ]);
        $customer = Customer::findOrFail($request->id);
        
        if($request->image)
        { 
            $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
           
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('images'), $imageName);
            $customer->image = $imageName;
        }
        if($request->password)
        {
            $customer->password = Hash::make($request->password);
        }
        $customer->user_name = $request->user_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
       

        $customer->save();
        return $this->returnData("customer data", $customer, "profile updated successfully", 200);

    }

    



}
