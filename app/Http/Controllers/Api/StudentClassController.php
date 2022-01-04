<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $errors = $this->validateInput($request);
        if($errors) {
            return response()->json([
                'status' => 'fail',
                'message' => $errors
            ], 400);
        }

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

    public function update(Request $request, $id)
    {
        $errors = $this->validateInput($request);
        if($errors) {
            return response()->json([
                'status' => 'fail',
                'message' => $errors
            ], 400);
        }

        $class_update = StudentClass::find($id);
        $class_update->class_name = $request->class_name;
        $class_update->save();

        return response()->json([
            'status' => 'success',
            'data' => $class_update
        ]);
    }

    public function delete($id)
    {
        $class_delete = StudentClass::find($id);
        if(!$class_delete) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Not found'
            ], 404);
        }
        $class_delete->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Class deleted'
        ], 204);
    }


    private function validateInput($request)
    {
        $validator = Validator::make($request->all(),[
            'class_name' => 'required|unique:student_classes|max:25',
        ]);
        if($validator->fails()) {
             return $validator->errors();

        }
    }
}
