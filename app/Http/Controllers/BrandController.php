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
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,jpeg,png'
        ], [
            'brand_name.required' => 'Please input brand name'
        ]);


        $brand_image = $request->file('brand_image')->store('images');
        Brand::create([
           'brand_name' => $request->brand_name,
           'brand_image' => $brand_image
        ]);

        return redirect("/brand/all")->with('status', 'Brand Created Successfully');

    }

    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }
}
