<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;

use App\User;

class SettingCont extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('setting.show-setting');
    }

    public function savePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'cpassword' => ['required', 'string', 'min:8'],
        ]);

        if ($request->password != $request->cpassword) {
            return redirect()->back()->with('alert-danger', 'Password confirm is not same');
        }

        $userId = Auth::user()->id;
        $user   = User::findOrFail($userId);
        $update = $user->update([
            'password' => Hash::make($request->password),
        ]);

        Auth::logout();
        return redirect('/login')->with('warning', 'Please login with new password!');
    }
}
