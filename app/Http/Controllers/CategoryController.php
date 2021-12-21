<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAllCategory()
    {
        return view('admin.category.index');
    }
}
