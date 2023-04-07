<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashboard  page
    public function index(Request $request)
    {
        $categories = Category::count();
        $products = Product::count();
        $offers = Offer::count();

        return view('pages.admin-panel.dashboard.dashboard', [
            'categories' => $categories, 'products' => $products, 'offers' => $offers
        ]);
    }
}
