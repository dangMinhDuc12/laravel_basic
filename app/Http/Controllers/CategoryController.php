<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function showAllCategory()
    {
        return view('admin.category.index');
    }

    public function addCategory(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ], [
            'category_name.required' => 'Please input category name'
        ]);

        $category = Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/category/all')->with('status', 'Category Inserted Successfully');
    }
}
