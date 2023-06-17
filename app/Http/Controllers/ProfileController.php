<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.admin-panel.profile.profile');
    }

    //edit admin in database function
    public function update(Request $request, $id)
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

        User::where('id', $id)
            ->update([
                "user_name" => $request->user_name,
                "image" => $file_name,
                "phone_number" => $request->phone_number,
                "email" => $request->email,
            ]);

        return redirect()->back()->with('message', 'Admin has updated successfully');
    }

    //delete profile from database function
    public function destroy(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'delete_checkbox' => 'required',
            ],
            [
                'delete_checkbox.required' => 'You must confirm your account deactivation',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = User::findOrFail($id);

        $image_path = public_path() . "/images/";
        $image = $image_path . $user->image;
        if (file_exists($image)) {
            unlink($image);
        }

        // Session::flush();
        // Auth::logout();

        $user->delete();
        return redirect()->route('landing')->with('message', 'Admin has deleted successfully');
    }
}
