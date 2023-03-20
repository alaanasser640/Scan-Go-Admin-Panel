<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.admin-panel.categories.categories', [
            'categories' =>$categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'num_of_types' => 'required|integer',
            'location' => 'required|min:5',
            'image' => 'required|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
        
        $request->image->move(public_path('images'), $imageName);

        Category::insert([
            'name'=>$request->name,
            'num_of_types'=>$request->num_of_types,
            'location'=>$request->location,
            'image' => $imageName,
        ] );
        return redirect('/categories')->with('message', 'Category added successfully');
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'num_of_types' => ['required', 'integer'],
            'location' => 'required|min:5'
        ]);

        $category = Category::findOrFail($request->category_id);
        if($request->image)
        { 
            $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            ]);
           
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('images'), $imageName);
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $category->num_of_types = $request->num_of_types;
        $category->location = $request->location;

        $category->save();

        return redirect('/categories')->with('message', 'Category updated successfully');
    }

    public function destroy(Request $request)
    {
        $delete_category = Category::findOrFail($request->deleted_category_id);
        $delete_category->delete();
        return redirect('/categories')->with('message', 'Category deleted successfully');
    }

    public function search(Request $request)
    {
        
        $categories = Category::query()
        ->where('name', 'LIKE', "%{$request->name}%") 
        ->get();
    
        return view('pages.admin-panel.categories.categories', [
                'categories' =>$categories]);
    }
}
