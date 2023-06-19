<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ReceiptController extends Controller
{
    public $link = 'https://8503-41-235-192-235.ngrok-free.app/images/';
    use GeneralTrait;
    // all receipts
    public function allReceipts($id) // customer_id
    {
        $receipts = DB::table('receipts')
            ->join('customers', 'customers.id', '=', 'receipts.customer_id')
            ->select('receipts.id', 'receipts.receipt_number', 'receipts.total_price', 'receipts.date', 'customers.user_name')
            ->where('customer_id', $id)->get();

        return $this->returnData("receipts", $receipts, "all receipts", 200);
    }

    // receipt details 
    public function receiptItems($id) // receipt_id
    {
        $receipt = DB::table('receipts')
            ->join('customers', 'customers.id', '=', 'receipts.customer_id')
            ->select('receipts.receipt_number', 'receipts.total_price', 'receipts.date', 'receipts.time', 'customers.user_name', 'customers.email')
            ->where('receipts.id', $id)->get()->first();

        $receiptItems =   DB::table('purchases')
            ->join('receipts', 'receipts.id', '=', 'purchases.receipt_id')
            ->select('purchases.quantity', 'purchases.total_price', 'purchases.product_id')
            ->where('receipts.id', $id)->get();
        foreach ($receiptItems as $item) {

            $product = DB::table('products')
                ->select('name', 'image')
                ->where('id', $item->product_id)->get()->first();
            $item->product_name = $product->name;
            $item->image = $this->link . $product->image;
        }
        $data = [
            'customer_name' => $receipt->user_name,
            'email' => $receipt->email,
            'receipt_number' => $receipt->receipt_number,
            'total_price' => $receipt->total_price,
            'time' => $receipt->time,
            'date' => $receipt->date,
            'receipt_items' => $receiptItems
        ];

        return $this->returnData("receiptItems", $data, "receipt items", 200);
    }

    public function addReceipt(Request $request)
    {
        return $request;
        // $validator = Validator::make($request->all(), [
        //     'customer_id' => 'required',


        // ]);
        // if ($validator->fails()) {
        //     return $this->returnError("Validation Error", $validator->errors(), 400);
        // }

        // $receipt = Receipt::create([
        //     'customer_id' => $request->customer_id,
        //     'receipt_number' => random_int(1, 10000),
        //     'date' => Carbon::now()->format('Y-m-d'),
        //     'time' => Carbon::now()->format('H:i:s'),


        // ]);

        // $receipt_id = $receipt->id;




        // $data = $request->data;
        // $totalPrice = 0;
        // $totalQuantity = 0;

        // foreach ($data as $id => $quantity) {
        //     $price = DB::table('products')->select("price", 'sold_units')->where('id', $id)->get()->first();
        //     // update quantity  and sold_units
        //     $product = Product::find($id);
        //     $product->stock -= intval($quantity);
        //     $product->sold_units += intval($quantity);
        //     $product->save();
        //     ///
        //     $totalPrice += intval($price->price);
        //     $totalQuantity += intval($quantity);

        //     // add purchases
        //     $receipt = DB::table('purchases')->insert([
        //         'receipt_id' => $receipt_id,
        //         'quantity' => $quantity,
        //         'product_id' => $id,
        //         'total_price' => $quantity * intval($price->price),

        //     ]);

        //     if (!($id >= 0)) {
        //         break;
        //     }
        // }

        // $receipt2 = Receipt::find($receipt_id);
        // $receipt2->total_price = $totalPrice;
        // $receipt2->total_quantity = $totalQuantity;
        // $receipt2->save();
        // return $this->returnSuccessMessage("Receipt Added Successfully", 201);  
    }

    // {
    //     "customer_id": 1,
    //     "data": {
    //         "John": 30,
    //         "Jane": 25,
    //         "Bob": 40
    //     }
    // }


}
