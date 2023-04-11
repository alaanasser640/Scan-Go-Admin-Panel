<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
        $customer->delete();
        session()->flash('success', 'Customer deleted successfully');
        return redirect()->route('customers');
    }




}
