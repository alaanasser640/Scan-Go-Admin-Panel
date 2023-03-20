<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    use GeneralTrait;
    public function categories()
    {
     $categories = DB::table('categories')
    ->select('id','name', 'image')
    ->get();
    foreach($categories as $category)
    {
        $category->image = '127.0.0.1:8000/images/'. $category->image;
    }
    if(count($categories) == 0)
    {
        return $this->returnSuccessMessage("no categories to show", 200);
        //return response()->json("no categories to show", 200);
    }
    else{
        return $this->returnData("categories", $categories,"all categories", 200);
        // return response()->json([
        //     'message' => "all categories",
        //     'categories' => $categories
        // ], 200);
    }
    
    }

    public function categoryProducts($id)
    {
        $products = DB::table('products')
        ->select('id', 'name', 'price', 'stock as quantity', 'image')
        ->where('category_id', $id)->get();
        foreach ($products as $product)
        {

            $product->image = '127.0.0.1:8000/images/' . $product->image;
        }
        if(count($products) == 0)
        {
            return $this->returnSuccessMessage("no products to show", 200);
           // return response()->json("no products to show", 200);
        }

        else{
            return $this->returnData("products", $products,"all products", 200);
            // return response()->json([
            //     'message' => "all products",
            //     'products' => $products
            // ], 200);
    }

    }
    
    

}
