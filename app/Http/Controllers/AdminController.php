<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CreateAdmin;
use App\Notifications\UpdateAdmin;
use App\Notifications\DestroyAdmin;


class AdminController extends Controller
{
    public function index(Request $request)
    {


        //search function
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $admins = User::where('user_name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")

                ->latest()->paginate();
        } else {
            $admins = User::latest()->paginate();
        }
        return view('pages.admin-panel.admins.admins', [
            'admins' => $admins
        ]);
    }

    //add new category page
    public function create()
    {
        return view('pages.admin-panel.admins.add_admin');
    }

    //edit categoty page
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('pages.admin-panel.admins.edit_admin', [
            'admin' => $admin
        ]);
    }

    //delete category page
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('pages.admin-panel.admins.delete_admin', [
            'admin' => $admin
        ]);
    }

    //display categories from database function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'phone_number' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $admin = new User();
        $admin->user_name = $request->user_name;
        $admin->image = $file_name;
        $admin->phone_number = $request->phone_number;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        Notification::send($admins, new CreateAdmin($admin->id, $admin_id, $admin->user_name));  //get creation info to notifications


        return redirect()->route('admins.index')->with('message', 'Admin has added successfully');
    }

    //edit category in database function
    public function update(Request $request, User $admin)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $file_name = $request->hidden_image;

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        User::where('id', $admin->id)
            ->update([
                "user_name" => $request->user_name,
                "image" => $file_name,
                "phone_number" => $request->phone_number,
                "email" => $request->email,
            ]);

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        Notification::send($admins, new UpdateAdmin($admin->id, $admin_id, $admin->user_name));  //get updation info to notifications


        return redirect()->route('admins.index')->with('message', 'Admin has updated successfully');
    }

    //delete category from database function
    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        $image_path = public_path() . "/images/";
        $image = $image_path . $admin->image;
        if (file_exists($image)) {
            unlink($image);
        }

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        Notification::send($admins, new DestroyAdmin($admin->id, $admin_id, $admin->user_name));  //get deletion info to notifications

        $admin->delete();
        return redirect()->route('admins.index')->with('message', 'Admin has deleted successfully');
    }
}
