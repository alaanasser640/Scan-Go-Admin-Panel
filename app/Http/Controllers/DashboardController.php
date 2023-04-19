<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //dashboard  page
    public function index()
    {
        if (Auth::check()) {
            $categories = Category::count();
            $products = Product::count();
            $offers = Offer::count();
            $customers = Customer::count();
            $admins = User::all()->count();
            $receipts = Receipt::count();


            return view('pages.admin-panel.dashboard.dashboard', [
                'categories' => $categories, 'products' => $products, 'offers' => $offers
                , 'customers' => $customers , 'admins' => $admins, 'receipts' => $receipts
            ]);
        }

        return redirect()->route('landing')->withSuccess('You are not allowed to access');
    }

    public function landing()
    {
        return view('pages.landing-page.landing');
    }
}
