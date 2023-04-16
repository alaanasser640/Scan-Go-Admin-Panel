<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DestroyCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('pages.admin-panel.customers.customers', ['customers' => $customers]);
    }


    public function delete($id)
    {  
        $customer = Customer::find($id);
        return view('pages.admin-panel.customers.delete_customer', ['customer' => $customer]);
    }
    public function destroy(Request $request)
    {
        // dd($request);
        $customer = Customer::findOrFail($request->id);

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        Notification::send($admins, new DestroyCustomer($customer->id, $admin_id, $customer->username));  //get deletion info to notifications

        $customer->delete();
        session()->flash('success', 'Customer deleted successfully');
        return redirect()->route('customers');
    }




}
