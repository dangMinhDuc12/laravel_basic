<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showAllCategory()
    {
        $categories = Category::latest()->paginate(2);

        //Query Builder
//        $categories = DB::table('categories')
//                        ->join('users', 'categories.user_id', '=', 'users.id')
//                        ->select('categories.*', 'users.name')
//                        ->latest()->paginate(2);
        return view('admin.category.index', compact('categories'));
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

    public function editCategory(Request $request, $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/category/all')->with('status', 'Category Updated Successfully');
    }
}
