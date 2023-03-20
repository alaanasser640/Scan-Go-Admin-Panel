<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('pages.admin-panel.products.products', [
            'products' =>$products, 'categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'stock'=>'required',
            'code'=>'required',
            'price'=>'required',
            'producer'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
        
        $request->image->move(public_path('images'), $imageName);

        Product::insert([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'stock'=>$request->stock,
            'code'=>$request->code,
            'price'=>$request->price,
            'producer'=>$request->producer,
            'image' => $imageName,
        ] );
        return redirect('/products')->with('message', 'Product added successfully');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'stock' => ['required', 'integer'],
            'producer' => 'required',
            'code' => 'required',
            'price' => ['required', 'integer']
        ]);

        $product = Product::findOrFail($request->product_id);

        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->producer = $request->producer;
        $product->code = $request->code;
        $product->price = $request->price;
        
        if(isset($request->category_id , $request->image))
        { 
            $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
            $product->category_id =$request->category_id;
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
        if(isset($request->category_id) and !isset($request->image))
        {
            $product->category_id =$request->category_id;

        }
        if(isset($request->image) and !isset($request->category_id))
        {
            $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect('/products')->with('message', 'Product updated successfully');
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->deleted_product_id);
        $product->delete();
        return redirect('/products')->with('message', 'Product deleted successfully');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $products = Product::query()
        ->where('name', 'LIKE', "%{$request->product}%") 
        ->get();

        return view('pages.admin-panel.products.products', [
                'products' =>$products, 'categories'=>$categories]);
    }
}
