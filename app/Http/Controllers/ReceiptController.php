<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;

use App\Models\Receipt;
use App\Models\User;
use App\Notifications\DestroyReceipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        // RECEIPT NO.	CUST. EMAIL	TOTAL QUANTITY	TOTAL PRICE	DATE	TIME	SENT BY EMAIL


        //search function
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $receipts = Receipt::where('receipt_number', 'like', "%$keyword%")
                ->latest()->paginate();
        } else {
            $receipts = Receipt::latest()->paginate();
            $receipts = Receipt::Join('customers', 'receipts.customer_id', '=', 'customers.id')
                ->select('receipts.*', 'customers.email')
                ->latest()->paginate();
        }
        return view('pages.admin-panel.receipts.receipts', [
            'receipts' => $receipts
        ]);
    }

    public function show($id)
    {
        $receipt = Receipt::Join('customers', 'receipts.customer_id', '=', 'customers.id')
            ->select('receipts.*', 'customers.email')
            ->where('receipts.id', $id)
            ->first();;

        $purchases = Receipt::Join('purchases', 'receipts.id', '=', 'purchases.receipt_id')
            ->Join('products', 'purchases.product_id', '=', 'products.id')
            ->select('purchases.quantity', 'purchases.total_price', 'products.name', 'products.price')
            ->where('receipts.id', $id)
            ->get();
        return view('pages.admin-panel.receipts.delete_receipt', [
            'purchases' => $purchases,
            'receipt' => $receipt
        ]);
    }
    public function destroy($id)
    {
        $product = Receipt::findOrFail($id);

        //notifications
        $admins = User::where('id', '!=', auth()->user()->id)->get();  //get all admins exept who logined
        $admin_id = auth()->user()->id;  //get the logined admin id
        Notification::send($admins, new DestroyReceipt($product->id, $admin_id, $product->receipt_number));  //get deletion info to notifications

        $product->delete();
        return redirect()->route('receipts.index')->with('message', 'Receipt has deleted successfully');
    }

    public function showReceipt($id)
    {
        $receipt = Receipt::Join('customers', 'receipts.customer_id', '=', 'customers.id')
            ->select('receipts.*', 'customers.email')
            ->where('receipts.id', $id)
            ->first();;

        $purchases = Receipt::Join('purchases', 'receipts.id', '=', 'purchases.receipt_id')
            ->Join('products', 'purchases.product_id', '=', 'products.id')
            ->select('purchases.quantity', 'purchases.total_price', 'products.name', 'products.price')
            ->where('receipts.id', $id)
            ->get();
        return view('pages.admin-panel.receipts.show_receipt', [
            'purchases' => $purchases,
            'receipt' => $receipt
        ]);
    }
}
