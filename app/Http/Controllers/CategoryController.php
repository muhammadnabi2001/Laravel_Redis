<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{

    public function index()
    {
        // dd(123);
        // $categories = Category::orderBy('id', 'desc')->paginate(10);
        // return view('Category.category', ['categories' => $categories]);
        Redis::flushall();
        $categories=Redis::get('categories');
        if(!$categories)
        {
            $categories=Category::all();
            Redis::set('categories',json_encode($categories->toArray()));
            return view('Category.category', ['categories' => $categories]);
        }
        $categories=json_decode($categories);
        dd($categories);
        return view('Category.category', ['categories' => $categories]);
    }
    
    public function store(Request $request)
    {
        // Validatsiya
        $validated = $request->validate([
            'name' => 'required|string|max:255', 
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        $categoryName = $request->input('name');

        $categoryId = Redis::incr('category_id');

        Redis::hmset('category:' . $categoryId, ['name' => $categoryName]);

        Redis::lpush('categories_list', $categoryId);

        return redirect()->back()->with('success', 'Category created successfully');
    }
    
    public function update(Request $request,Category $category)
    {
        $validated=$request->validate([
            'name' => 'required|string|max:255', 
        ]);
        $category->update([
            'name'=>$request->name
        ]);
        return redirect()->back()->with('success','Category updated successfully');
    }
    
    public function destroy(Category $category)
    {
        // dd($category->name);
        $category->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }
}
