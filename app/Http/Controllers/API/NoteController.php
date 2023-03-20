<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    use GeneralTrait;
    public function notes($id)
    {

        $query = DB::table('products as p')
            ->select('p.name', 'p.price', 'p.image', 'n.id', 'n.quntity')
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
            $product->image = '127.0.0.1:8000/images/' . $product->image;
        }
        return $this->returnData("notes", $products, "customer notes", 200);
    }
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
    public function insertNote(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'quntity' => 'required'
        ]);
        $check = DB::table('notes')
            ->where('customer_id', '=', $request->customer_id)
            ->where('product_id', '=', $request->product_id)
            ->get()->toArray();
        if (count($check) == 0) {

            $customer = Customer::find($request->customer_id);
            $product = Product::find($request->product_id);

            $customer->notes()->attach($product, ['quntity' => $request->quntity]);
            return $this->returnSuccessMessage("note has been added successfully suuccessfully", 200);
        } else {
            return $this->returnError("validation errors", 'this note is already existed', 202);
        }
    }
    public function deleteAllNotes()
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {
            $customer->notes()->detach();
        }
        return $this->returnSuccessMessage("all notes has been deleted", 200);
    }
    public function updateNote(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'quntity' => 'required'
        ]);
        DB::table('notes')->where('id', $request->id)
            ->update([
                'quntity' => $request->quntity,
            ]);
        return $this->returnSuccessMessage("the note has been updated successfully", 200);
        
            
    }


}
