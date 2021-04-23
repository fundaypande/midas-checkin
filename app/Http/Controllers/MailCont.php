<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\User;
use App\Setting;
use Auth;

class MailCont extends Controller
{
    public function sendVerify()
    {
        $user = User::find(Auth::user()->id);

        $nama   = $user->name;
        $id     = $user->id;
        $token  = $user->token;

        $title = Setting::find(1);
        $user['web_title'] = $title->value;

        try{
            Mail::send('email.email-verify', ['nama' => $nama, 'user' => $user], function ($message) use ($user)
            {
                $message->subject('Verify Your Email');
                $message->from('donotreply@funware.co.id', $user->web_title);
                $message->to($user->email);
            });

            return $user;
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function verifyAt($userId, $token)
    {
        $user = User::find($userId);

        if ($user) {
            if ($user->token === $token) {
                $user->update([
                    'email_verified_at' => now()
                ]);
                return view('email.email-valid');
            } else {
                return view('email.email-not-valid');
            }
        } else {
            return view('email.email-not-valid');
        }
    }
}
