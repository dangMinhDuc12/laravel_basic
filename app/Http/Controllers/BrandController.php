<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;

        if($request->brand_image) {
            $old_image = $brand->brand_image;
            Storage::delete($old_image);
            $brand->brand_image = $request->file('brand_image')->store('images');
        }
        $brand->save();
        return redirect('/brand/all')->with('status', 'Brand updated successfully');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        Storage::delete($brand->brand_image);
        $brand->delete();
        return redirect('/brand/all')->with('status', 'Brand Deleted Successfully');
    }
}
