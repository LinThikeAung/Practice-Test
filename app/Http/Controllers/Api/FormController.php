<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormResource;
use App\Models\CustomerForm;
use App\Models\Form;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function update(Request $request)
    {
        try {
            if ($request->name) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Name is required',
                ]);
            }
            if ($request->email) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Email is required',
                ]);
            }
            $form = Form::first();
            if ($form) {
                $form->update([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone ? 1 : 0,
                    'dob'      => $request->dob ?   1 : 0,
                    'gender'   => $request->gender ?   1 : 0,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Form Inputs Updated Successfully.',
                ]);
            } else {
                Form::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone ? 1 : 0,
                    'dob'      => $request->dob ?   1 : 0,
                    'gender'   => $request->gender ?   1 : 0,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Form Inputs Updated Successfully.',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something is wrong.',
            ]);
        }
    }

    public function list()
    {
        return FormResource::collection(CustomerForm::all());
    }
}
