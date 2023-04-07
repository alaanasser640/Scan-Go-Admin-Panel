<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $link = 'https://648d-41-235-174-92.eu.ngrok.io';
    use GeneralTrait;
    // return all categories
    public function categories()
    {
        $categories = DB::table('categories')
            ->select('id', 'name', 'image')
            ->get();
        foreach ($categories as $category) {
            $category->image = $this->link . $category->image;
        }

        return $this->returnData("categories", $categories, "all categories", 200);
    }
    // return products in a specific category
    public function categoryProducts($id)
    {
        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', 'products.name as product_name', 'products.price', 'products.category_id', 'products.stock as quantity', 'products.image', 'categories.location', 'categories.name as category_name')
            ->where('categories.id', '=', $id)
            ->get()->toArray();

        $product_offer =  DB::table('offers')
            ->join('products', 'products.id', '=', 'offers.product_id')
            ->select('offers.value as offer_value', 'offers.product_id')
            ->get()->toArray();
        foreach ($products as $product) {
            $product->offer_value = 0;
            foreach ($product_offer as $offer) {
                if ($product->id == $offer->product_id) {
                    $product->offer_value = $offer->offer_value;
                }
            }
            $product->image = $this->link . $product->image;
        }
        // check if the product is liked or not
        foreach ($products as $product) {
            $check = DB::table('favorite_products')
                ->where('product_id', $product->id)
                ->where('customer_id', '=', $id)
                ->get();
            if (count($check) > 0) {
                $product->liked = 1;
            } else {
                $product->liked = 0;
            }
        }



        return $this->returnData("products", $products, "all products", 200);
    }
}
