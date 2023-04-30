<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Form as MailForm;
use App\Models\CustomerForm;
use App\Models\Form;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function updateForm(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
        ]);
        $form = Form::first();
        if ($form) {
            $form->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone ? 1 : 0,
                'dob'      => $request->dob ?   1 : 0,
                'gender'   => $request->gender ?   1 : 0,
            ]);
        } else {
            Form::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone ? 1 : 0,
                'dob'      => $request->dob ?   1 : 0,
                'gender'   => $request->gender ?   1 : 0,
            ]);
        }
        return redirect('dashboard');
    }

    public function index()
    {
        $form = Form::first();
        return view('welcome', compact('form'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name'     => 'required',
                'email'    => 'required|email|unique:customer_forms',
            ]);
            $form   = new CustomerForm();
            $result = $request->all();
            $saved  = $form->fill($result)->save();
            $url    = env('APP_URl') . '/api/mail/send';
            if ($saved) {
                $data       = [
                    "title"  => 'Thank you for your survey',
                    "name"   => $request->name,
                    "email"  => $request->email,
                    "phone"  => $request->phone ? $request->phone : null,
                    "dob"    => $request->dob ? $request->dob : null,
                    "gender" => $request->gender ? $request->gender : null
                ];
                $sendmail   = Mail::to($request->email)->send(new MailForm($data));
                if ($sendmail) {
                    $success = "Please Check out your mail inbox.";
                    return redirect('/')->with('success', $success);
                } else {
                    $error = "Something was wrong. Please try again!";
                    return redirect('/')->with('error', $error);
                }
            }
        } catch (ValidationException $e) {
            $error = "Something was wrong. Please try again!";
            return redirect('/')->with('error', $error);
        }
    }
}
