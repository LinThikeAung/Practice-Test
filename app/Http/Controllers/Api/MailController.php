<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $data       = [
            "title"  => 'Thank you for your survey',
            "name"   => $request->name,
            "email"  => $request->email,
            "phone"  => $request->phone ? $request->phone : null,
            "dob"    => $request->dob ? $request->dob : null,
            "gender" => $request->gender ? $request->gender : null
        ];
        $sendmail   = Mail::to($request->email)->send(new Form($data));

        if ($sendmail) {
            return response()->json(['message' => 'Mail Sent Sucssfully'], 200);
        } else {
            return response()->json(['message' => 'Mail Sent fail'], 400);
        }
    }
}
