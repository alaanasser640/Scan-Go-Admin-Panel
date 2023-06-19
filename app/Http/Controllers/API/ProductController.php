<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;


class ProductController extends Controller
{
    public $link = 'https://8503-41-235-192-235.ngrok-free.app/images/';
    use GeneralTrait;
    // all products
    public function products($id) // $customer_id
    {

        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', 'products.name as product_name', 'products.price', 'products.category_id', 'products.stock as quantity','products.sold_units', 'products.image', 'categories.location', 'categories.name as category_name')
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
    // like product
    public function insertFavoriteProduct(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $product_id = $request->input('product_id');
        if (!Product::where('id', $product_id)->exists() || !Customer::where('id', $customer_id)->exists())
        {
            return $this->returnError("validation errors","product or customer not found", 404);
        }
        $check = DB::table('favorite_products')
            ->where('customer_id', '=', $customer_id)
            ->where('product_id', '=', $product_id)
            ->get()->toArray();
        if (count($check) == 0) {

            $customer = Customer::find($customer_id);
            $product = Product::find($product_id);

            $customer->favorite_products()->attach($product);
            return $this->returnSuccessMessage("product added to favourites suuccessfully", 200);
        } else {
            return $this->returnError("validation errors", 'this product is laready liked', 202);
        }
    }
    // dislike product
    public function deleteFavoriteProduct(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $product_id = $request->input('product_id');

        $check = DB::table('favorite_products')
            ->where('customer_id', '=', $customer_id)
            ->where('product_id', '=', $product_id)
            ->get()->toArray();
        if (count($check) > 0) {
            $customer = Customer::find($customer_id);
            $product = Product::find($product_id);

            $customer->favorite_products()->detach($product);
            return $this->returnSuccessMessage("product deleted from favourites suuccessfully", 200);
        } else {
            return $this->returnError("validation errors", 'this product is laready unliked', 202);
        }
    }
    // all liked products 
    public function favouriteProducts($id)
    {
        $customer_products = DB::table('products')
            ->whereExists(function ($query) use ($id) {
                $query->select(DB::raw(1))
                    ->from('customers')
                    ->join('favorite_products', 'customers.id', '=', 'favorite_products.customer_id')
                    ->whereRaw('products.id = favorite_products.product_id')
                    ->where('customers.id', '=', $id);
            })->get();

        $products = DB::table('favorite_products')
            ->join('products', 'favorite_products.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', 'products.name as product_name', 'products.price', 'products.category_id', 'products.stock as quantity', 'products.image', 'categories.location', 'categories.name as category_name')
            ->where('favorite_products.customer_id', '=', $id)
            ->get();

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
            $product->liked = 1;
        }




        return $this->returnData("products", $products, "favorite  products", 200);
    }
}
