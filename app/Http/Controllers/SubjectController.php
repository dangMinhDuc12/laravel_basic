<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function showAll()
    {
        $subjects = Subject::latest()->get();
        return response()->json([
            'status' => 'success',
            'data' => $subjects
        ]);
    }

    public function getOne($id)
    {
        $subject = Subject::find($id);
        if(!$subject) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Not found'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $subject
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

        $new_subject = Subject::create([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response()->json([
            'status' => 'Success',
            'data' => $new_subject
        ], 201);
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

        $subject_update = Subject::find($id);
        $subject_update->subject_name = $request->subject_name;
        $subject_update->class_id = $request->class_id;
        $subject_update->subject_code = $request->subject_code;
        $subject_update->save();

        return response()->json([
            'status' => 'success',
            'data' => $subject_update
        ]);
    }

    public function delete($id)
    {
        $subject_delete = Subject::find($id);
        if(!$subject_delete) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Not found'
            ], 404);
        }
        $subject_delete->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Subject deleted'
        ], 204);
    }


    private function validateInput($request)
    {
        $validator = Validator::make($request->all(),[
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects'
        ]);
        if($validator->fails()) {
            return $validator->errors();

        }
    }
}
