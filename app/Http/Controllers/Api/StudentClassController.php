<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function showAll()
    {
        $classes = StudentClass::latest()->get();
        return response()->json([
            'status' => 'success',
            'data' => $classes
        ]);
    }

    public function store(Request $request)
    {
        $new_class = StudentClass::create([
            'class_name' => $request->class_name
        ]);
        return response()->json([
            'status' => 'Success',
            'data' => $new_class
        ], 201);
    }

    public function getOne($id)
    {
        $class = StudentClass::find($id);
        if(!$class) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Not found'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $class
        ]);
    }
}
