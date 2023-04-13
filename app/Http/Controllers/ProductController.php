<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    //products table page
    public function index(Request $request)
    {
        //$products = Product::all();

        //search function
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $products = Product::where('name', 'like', "%$keyword%")
                ->orWhere('producer', 'like', "%$keyword%")
                ->orWhereHas('category', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                ->orWhere('stock', 'like', "%$keyword%")
                ->orWhere('code', 'like', "%$keyword%")
                ->orWhere('price', 'like', "%$keyword%")
                ->latest()->paginate();
        } else {
            $products = Product::latest()->paginate();

            //leftJoin --> get all the data of products table even if product that don't have offers
            $products = Product::leftJoin('offers', 'products.id', '=', 'offers.product_id')
                ->select('products.*', 'offers.id as offer_id', 'offers.value')
                ->latest()->paginate();

            //print_r($products);
        }
        $categories = Category::all();
        // $offers = Offer::all();
        return view('pages.admin-panel.products.products', [
            'products' => $products, 'categories' => $categories
        ]);
    }

    //add new product page
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin-panel.products.add_product', [
            'categories' => $categories
        ]);
    }

    //edit product page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin-panel.products.edit_product', [
            'product' => $product, 'categories' => $categories
        ]);
    }

    //delete product page
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $offers = Offer::all();
        return view('pages.admin-panel.products.delete_product', [
            'product' => $product, 'offers' => $offers
        ]);
    }

    //display products from database function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:products,name',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required',
            'stock' => 'required|integer',
            'code' => 'required',
            'price' => 'required',
            'producer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product = new Product();
        $product->name = $request->name;
        $product->image = $file_name;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->producer = $request->producer;

        $product->save();

        return redirect()->route('products.index')->with('message', 'Product has added successfully');
    }

    //edit product in database function
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required',
            'stock' => 'required|integer',
            'code' => 'required',
            'price' => 'required',
            'producer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $file_name = $request->hidden_image;
        if ($request->image != ' ') {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        $product = Product::findOrFail($request->hidden_id);

        $product->name = $request->name;
        $product->image = $file_name;
        $product->stock = $request->stock;
        $product->producer = $request->producer;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->update();

        return redirect()->route('products.index')->with('message', 'Product has updated successfully');
    }

    //delete product from database function
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $image_path = public_path() . "/images/";
        $image = $image_path . $product->image;
        if (file_exists($image)) {
            unlink($image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product has deleted successfully');
    }

    //search product
    public function search(Request $request)
    {
        $categories = Category::all();
        $products = Product::query()
            ->where('name', 'LIKE', "%{$request->product}%")
            ->get();

        return view('pages.admin-panel.products.products', [
            'products' => $products, 'categories' => $categories
        ]);
    }

}
