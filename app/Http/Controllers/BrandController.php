<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showAllBrand()
    {
        $brands = Brand::latest()->paginate(2);
        return view('admin.brand.index', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:255'
        ], [
            'brand_name.required' => 'Please input brand name'
        ]);
    }
}
