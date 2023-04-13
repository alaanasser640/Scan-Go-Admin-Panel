<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //categories table page
    public function index(Request $request)
    {
        //$categories = Category::all();

        //search function
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $categories = Category::where('name', 'like', "%$keyword%")
                ->orWhere('num_of_types', 'like', "%$keyword%")
                ->orWhere('location', 'like', "%$keyword%")
                ->latest()->paginate();
        } else {
            $categories = Category::latest()->paginate();
        }
        return view('pages.admin-panel.categories.categories', [
            'categories' => $categories
        ]);
    }

    //add new category page
    public function create()
    {
        return view('pages.admin-panel.categories.add_category');
    }

    //edit categoty page
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.admin-panel.categories.edit_category', [
            'category' => $category
        ]);
    }

    //delete category page
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.admin-panel.categories.delete_category', [
            'category' => $category
        ]);
    }

    //display categories from database function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name',
            'image' => 'required|mimes:jpeg,png,jpg',
            'num_of_types' => 'required|integer',
            'location' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $category = new Category();
        $category->name = $request->name;
        $category->image = $file_name;
        $category->num_of_types = $request->num_of_types;
        $category->location = $request->location;

        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category has added successfully');
    }

    //edit category in database function
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg',
            'num_of_types' => 'required|integer',
            'location' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $file_name = $request->hidden_image;

        if ($request->image != ' ') {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $file_name);
        }

        $category = Category::findOrFail($request->hidden_id);

        $category->name = $request->name;
        $category->image = $file_name;
        $category->num_of_types = $request->num_of_types;
        $category->location = $request->location;

        $category->update();

        return redirect()->route('categories.index')->with('message', 'Category has updated successfully');
    }

    //delete category from database function
    public function destroy($id)
    {
        // $category = Category::withCount('products')->findOrFail($id);   
        // if($category->products->count() > 0) {
        //     return redirect()->route('categories.show', $category->id)->with('error_message', 'Category cannot be deleted, it has products.');
        // }
        $category = Category::findOrFail($id);

        $image_path = public_path() . "/images/";
        $image = $image_path . $category->image;
        if (file_exists($image)) {
            unlink($image);
        }

        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category has deleted successfully');
    }

    //search category function
    // public function search(Request $request)
    // {

    //     $categories = Category::query()
    //         ->where('name', 'LIKE', "%{$request->name}%")
    //         ->get();

    //     return view('pages.admin-panel.categories.categories', [
    //         'categories' => $categories
    //     ]);
    // }
}
