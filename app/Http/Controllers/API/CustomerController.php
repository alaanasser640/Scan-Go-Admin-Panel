<?php

namespace App\Http\Controllers\API;

use \App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\RelatedAccounts;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    use GeneralTrait;
    public function customerPoints($id)
    {
        $points = DB::table('customers')
            ->select('points')
            ->where('id', '=', $id)
            ->get()->first();
        $customer_points = $points->points;
        return $this->returnData("points", $customer_points, "customer points", 201);
    }

    public function deleteRelatedAccount(Request $request)
    {
        $delete_account = RelatedAccounts::findOrFail($request->id);
        $delete_account->delete();
        return $this->returnSuccessMessage("the account has been deleted successfully", 201);
    }
    public function relatedAccounts($id) // customer id
    {
        $accounts = DB::table('customers as c')
            ->join('related_accounts as r', 'r.customer_id', '=', 'c.id')
            ->select('c.user_name', 'c.email', 'c.phone_number')
            ->where('r.customer_id', '=', $id)
            ->get();
        return $this->returnData("accounts", $accounts, "customer related accounts", 201);
    }
    public function addRelatedAccount(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'email' => 'email',
        ]);

        $customer = DB::table('customers')->where('email', $request->email)->first();
        if ($customer) {
            $random = Str::random(4);
            
        } else {
            return $this->returnError("validation errors", 'this email is not existed', 202);

        }
    }
}
