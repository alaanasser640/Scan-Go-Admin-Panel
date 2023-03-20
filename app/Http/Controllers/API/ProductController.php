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
   
    use GeneralTrait;
    public function products()
    {

        $products = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.id', 'products.name as product_name', 'products.price','products.category_id', 'products.stock as quantity', 'products.image', 'categories.location', 'categories.name as category_name')
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
            $product->image = '127.0.0.1:8000/images/' . $product->image;
        }

        if(count($products) == 0)
        {
            return $this->returnSuccessMessage("no products to show", 200);
        }

        else{
            return $this->returnData("products", $products,"all products", 200);
           
    }
    }
    public function insertFavoriteProduct(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'product_id'=> 'required',
        ]);
        $check = DB::table('favorite_products')
            ->where('customer_id','=', $request->customer_id)
            ->where('product_id', '=', $request->product_id)
            ->get()->toArray();
        if(count($check) == 0)
        {
        
        $customer = Customer::find($request->customer_id);
        $product = Product::find($request->product_id);
        
        $customer->favorite_products()->attach($product); 
        return $this->returnSuccessMessage("product added to favourites suuccessfully", 200);
        }
            else{
                return $this->returnError("validation errors", 'this product is laready liked', 202);

            }
    }
    public function deleteFavoriteProduct(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'product_id'=> 'required',
        ]);
        $check = DB::table('favorite_products')
            ->where('customer_id','=', $request->customer_id)
            ->where('product_id', '=', $request->product_id)
            ->get()->toArray();
        if(count($check) > 0)
        {
            $customer = Customer::find($request->customer_id);
            $product = Product::find($request->product_id);
            
            $customer->favorite_products()->detach($product); 
            return $this->returnSuccessMessage("product deleted from favourites suuccessfully", 200);
        }
        else{
            return $this->returnError("validation errors", 'this product is laready unliked', 202);

        }
        
    }
    public function favouriteProducts($id)
    {   
        
        
        $customer_products = Product::whereHas('customers', function($query) use($id) 
        {
            $query->where('customers.id','=', $id);
        })->get();
        return $this->returnData("products", $customer_products,"favorite  products", 200);
    }
    
}
