<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class loginAdminController extends Controller
{

    public function login(Request $request)
    {

        $val = validator($request->all(), [
            'email' => 'required|email|exists:Admins,email',
            'Password' => 'required',
            'remember' => 'required|boolean',
        ]);

        if (!$val->fails()) {

            $caek = ['email' => $request->input('email'), 'password' => $request->input('Password')];
            if (Auth::guard('adminlogen')->attempt($caek, $request->input('remember'))) {
                return response()->json(['message' => 'The password is correct'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'The password is wrong
                '], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['message' =>  $val->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }



    public function logout(Request $request)
    {
        Auth::guard('adminlogen')->logout();
        $request->session()->invalidate();

        return redirect()->guest(route('login'));
    }




    public function notice(Request $request)

    {
        return response()->view('admin.activation');
    }


    public function sendemail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'the email has been sent'], Response::HTTP_OK);
    }


    public function verify(EmailVerificationRequest $request)

    {
        $request->fulfill();
        return  redirect()->route('index');
    }
}
