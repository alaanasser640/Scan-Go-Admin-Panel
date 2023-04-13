<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Customer;

class ContactController extends Controller
{
    //contact table page
    public function index(Request $request)
    {
        // $contacts = Contact::all();
        
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $contacts = Contact::join('customers', 'customers.id', '=', 'contacts.customer_id')
                ->select('contacts.*', 'customers.user_name', 'customers.email')
                ->orWhere('customers.user_name', 'like', "%$keyword%")
                ->orWhere('customers.email', 'like', "%$keyword%" . "%")
                ->paginate();
        } else {
            $contacts = Contact::join('customers', 'customers.id', '=', 'contacts.customer_id')
                ->select('contacts.*', 'customers.user_name', 'customers.email')
                ->paginate();
        }

        $customers = Customer::all();
        return view('pages.admin-panel.contact.contact', [
            'contacts' => $contacts, 'customers' => $customers
        ]);
    }

    //edit category in database function
    public function update(Request $request, Contact $contact)
    {
        $contact = Contact::findOrFail($request->contact_id);
        $contact->status = 1;
        $contact->update();
        return redirect()->route('contacts.index')->with('message', 'Contact has marked as read...');
    }

    //delete contact page
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $customers = Customer::all();
        return view('pages.admin-panel.contact.delete_contact', [
            'contact' => $contact, 'customers' => $customers
        ]);
    }

    //delete contact from database function
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact has deleted successfully');
    }
    
    //add new contact page
    // public function create()
    // {
    //     $customers = Customer::all();
    //     return view('pages.admin-panel.contact.add_contact', [
    //         'customers' => $customers
    //     ]);
    // }

    //display contact from database function
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'customer_id' => 'required',
    //         'message' => 'required',
    //         'status' => 'required',
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator->errors());
    //     }

    //     $contact = new contact();
    //     $contact->customer_id = $request->customer_id;
    //     $contact->message = $request->message;
    //     $contact->status = $request->status;

    //     $contact->save();

    //     return redirect()->route('contacts.index')->with('message', 'Contact has added successfully');
    // }

}
