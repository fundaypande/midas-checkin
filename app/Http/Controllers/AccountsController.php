<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\user;
use App\Setting;
use Auth;
use Mail;
use App\History;

class AccountsController extends Controller
{
    protected $master = 1;
    protected $update = 2;


    public function validatePasswordRequest(Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)
            ->first();
        //Check if the user exists
        if (count($user) < 1) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();
            // dd($this->sendResetEmail($request->email, $tokenData->token));
        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        $user->link = $link;
        $title = Setting::find(1);
        $user->web_title = $title->value;

        // dd($user->email);
        try {
            //Here send the link with CURL with an external email API
            Mail::send('email.email-reset', ['user' => $user], function ($message) use ($user)
            {
                $message->subject('Request For Password Reset');
                $message->from('donotreply@funware.co.id', $user->web_title);
                $message->to($user->email);
            });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function sendSuccessEmail($email)
    {
        //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->first();

        $title = Setting::find(1);
        $user->web_title = $title->value;
        $user->now = now();

        // dd($user->email);
        try {
            //Here send the link with CURL with an external email API
            Mail::send('email.email-confirm-reset', ['user' => $user], function ($message) use ($user)
            {
                $message->subject('Request For Password Reset');
                $message->from('donotreply@funware.co.id', $user->web_title);
                $message->to($user->email);
            });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getReset(Request $request, $token)
    {
        $email = $request->email;
        $data = DB::table('password_resets')->where('email', $email)->where('token', $token)->first();
        if ($data) {
            return view('auth.passwords.reset', ['token' => $token]);
        } else {
            return view('email.email-not-valid');
        }
    }

    public function resetPassword(Request $request)
    {
        //Validate input
        $validatedData = $request->validate([
            'email' => 'required|max:191|string|email',
            'password' => 'required|min:8|confirmed',
        ]);

        //check if input is valid before moving on
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors(['email' => 'Make sure input is valid. Password at least 8 character. And Check your password ver']);
        // }



        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->where('email', $request->email)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return redirect()->back()->with('warning', 'Invalid Token or Email');



        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->with(['warning' => 'Email not found']);
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        History::MUpdate($this->master, $user->id, $user->name.' Reset password by email', $user);

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return redirect('login');
        } else {
            return redirect()->back()->with(['warning' => trans('A Network Error occurred. Please try again.')]);
        }

    }


}
