<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;

class ReceiptController extends Controller
{
    use GeneralTrait;
    public function allReceipts($id)
    {
        $receipts = DB::table('receipts')
        ->select('id', 'receipt_number', 'total_price', 'date', 'time')
        ->where('customer_id', $id)->get();
        if(count($receipts) == 0)
        {
            return $this->returnSuccessMessage("no receipts to show", 201);
        }

        else{
            return $this->returnData("receipts", $receipts,"all receipts", 200);
    }
    }
}
