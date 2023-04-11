<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    use GeneralTrait;
    // all notes
    public function notes($id)// customer_id
    {

        $query = DB::table('products as p')
            ->select('p.name', 'p.price', 'p.image', 'n.quantity')
            ->distinct()
            ->from('products as p')
        
            ->join('notes as n', 'p.id', '=', 'n.product_id')
            ->whereExists(function ($query) use ($id) {
                $query->select(DB::raw(1))
                    ->from('customers')
                    ->join('notes', 'customers.id', '=', 'notes.customer_id')
                    ->whereColumn('p.id', 'notes.product_id')
                    ->where('customers.id', '=', $id);
            });

        $products = $query->get();
        foreach ($products as $product) {
            $product->image = 'https://bb82-105-37-100-22.eu.ngrok.io/images/' . $product->image;
        }
        
        return $this->returnData("notes", $products, "customer notes", 201);
    }


    // delete note 
    public function deleteNote(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
        ]);
        $check = DB::table('notes')
            ->where('customer_id', '=', $request->customer_id)
            ->where('product_id', '=', $request->product_id)
            ->get()->toArray();
        if (count($check) > 0) {
            $customer = Customer::find($request->customer_id);
            $product = Product::find($request->product_id);

            $customer->notes()->detach($product);
            return $this->returnSuccessMessage("this note has been deleted successfully", 201);
        } else {
            return $this->returnError("validation errors", 'this note is not existed', 202);
        }
    }
    // insert note
    public function insertNote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]);
      
        if ($validator->fails()) {
            return $this->returnError("validation errors", $validator->errors(), 202);
        }
        $check = DB::table('notes')
            ->where('customer_id', '=', $request->customer_id)
            ->where('product_id', '=', $request->product_id)
            ->get()->toArray();
            

        if (count($check) == 0) {

            $customer = Customer::find($request->customer_id);
            $product = Product::find($request->product_id);

            $customer->notes()->attach($product, ['quantity' => $request->quantity]);
            return $this->returnSuccessMessage("note has been added successfully suuccessfully", 201);
        } else {
            return $this->returnError("validation errors", 'this note is already existed', 202);
        }

    }
    // delete all notes
    public function deleteAllNotes(Request $request)
    {
        $customer = Customer::find($request->customer_id);

       
        $customer->notes()->detach();
       
        return $this->returnSuccessMessage("all notes has been deleted", 200);
    }

     // update note 
     // الابديت هنا مش هيكون بال اي دي ده 
    public function updateNote(Request $request)
    {
        $request->validate([
           
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]);
        DB::table('notes')->where('customer_id', $request->customer_id)
        ->where('product_id', $request->product_id)
            ->update([
                'quantity' => $request->quantity,
            ]);
        return $this->returnSuccessMessage("the note has been updated successfully", 200);
        
            
    }
    

}
