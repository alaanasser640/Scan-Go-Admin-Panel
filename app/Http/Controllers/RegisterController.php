<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\RegisterAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;



class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.login-register.login');
    }

    public function customLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
            
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->flash('success', 'You Are Loginned Successfully');
            return redirect()->route('dashboard')
                ->withSuccess('Signed in');
        }
        session()->flash('error', 'You are not authenticated!');
        return redirect("log_in");
    }

    public function registration()
    {
        return view('pages.login-register.sign_up');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
            'phone_number' => 'required|min:11|unique:users',
            'check' =>'required',
        ],
        [
            'check.required'=> 'You must agree to the terms and conditions',
        ]
    );
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

    
        $user = new User();
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);

        $user->save();
        //dd($validator);
        
        $this->customLogin($request);
        return redirect()->route('dashboard')->withSuccess('You have signed-in');

        //notifications
        // $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        // $admin_id = auth()->user()->id;  //get the logined admin username
        // Notification::send($admins, new RegisterAdmin($user->id, $user->name));  //get creation info to notifications

    }

    public function create(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password'])
        ]);
    }



    public function signOut()
    {
        Session::flush();
        Auth::logout();

        session()->flash('success', 'You Have Logged-out');
        return redirect("landing");
    }
}
