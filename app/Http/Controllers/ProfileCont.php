<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use Storage;
use Image;

use App\User;
use App\History;

class ProfileCont extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $master = 1;
    protected $view = 1;
    protected $update = 2;

    public function show()
    {
        return view('profile.show-profile');
    }

    public function viewReset()
    {
        return view('auth.passwords.change-password');
    }

    public function storeReset(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'current_password' => 'required|max:191|string',
            'new_password' => 'required|min:8',
            'confirmation_password' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        $hashCurrent = Hash::make($request->current_password);
        $hashNew = Hash::make($request->new_password);
        // dd($hashCurrent);
        // cek current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('alert-danger', 'Wrong current password');
        }

        // check confirmation
        if ($request->new_password != $request->confirmation_password) {
            return redirect()->back()->with('alert-danger', 'Password confirmation not same');
        }



        $user -> update([
            'password' => $hashNew
        ]);

        History::MUpdate($this->master, $user->id, $user->name . ' change password from admin panel', $user);

        return redirect()->back()->with('alert-success', 'Your password has been changed');
    }

    public function verifyEmail()
    {
        $user = User::find(Auth::user()->id);
        $user->sendEmailVerificationNotification();

        return 'done send';
    }

    public function tes()
    {
        return view('profile.tes');
    }

    public function cekUsername()
    {
        return User::select('username as dataField')->get();
    }

    public function cekEmail()
    {
        return User::select('email as dataField')->get();
    }

    // save update profile
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'username' => 'required|max:191',
        ]);
        $idUser = Auth::user()->id;
        $user   = User::findOrFail($idUser);

        History::MUpdate($this->master, $idUser, 'Update user profile with ID User: '. $idUser. ' by him self', $user);

        // cek username
        $username  = User::where('username', $request->username)->select('username')->first();
        $loginUser = User::getUsername();
        // dd($username->username);
        if ($username) {
            if ($loginUser != $request->username) {
                return redirect()->back()->with('alert-danger', 'Choose unique username');
            }
        }

        // cek ragex username
        if (!preg_match('/^[a-z0-9_-]{3,15}$/', $request->username)){
            return redirect()->back()->with('alert-danger', 'Username invalid');
        }

        $update = $user->update([
            'name' => $request->name,
            'username' => $request->username,
            // 'nationality' => $request->nationality,
            // 'phone' => $request->phone,
            // 'men' => $request->gender,
            // 'subscribe' => $request->subscribe,
        ]);


        return redirect()->back()->with('alert-success', 'Success update profile');
    }

    public function upload(Request $request)
    {
        $folderPath = public_path('/uploads/users/profiles');

        $image_parts = explode(";base64,", $request->photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $nameFile = 'profile-'.Auth::user()->id;
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . '/' . $nameFile . '.png';
        $dbPath = '/uploads/users/profiles/'. $nameFile . '.png';

        file_put_contents($file, $image_base64);

        // store to database
        $idUser = Auth::user()->id;
        $user   = User::findOrFail($idUser);

        $update = $user->update([
            'photo' => $dbPath,
        ]);

        History::MUpdate($this->master, $idUser, 'Update user photo profile with ID User: '. $idUser.' by him self');

        return response()->json(['success'=>'success']);
    }

    public function photoSave(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        $extension  = $request->photo->extension();
        $nameFile   = 'profile-'.Auth::user()->id.'.'.$extension;
        $publicPath = public_path('/uploads/users/profiles/');
        $dbPath     = '/uploads/users/profiles/'. $nameFile;
        $serverPath = $publicPath . $nameFile;
        // dd($serverPath);
        $image = $request->photo;
        $img = Image::make($image->path());

        // if want to keep ratio
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($serverPath);

        // $img->resize(300, 300)->save($serverPath);

        // store to database
        $idUser = Auth::user()->id;
        $user   = User::findOrFail($idUser);

        $update = $user->update([
            'photo' => $dbPath,
        ]);

        History::MUpdate($this->master, $idUser, 'Update user photo profile with ID User: '. $idUser.' by him self');

        return redirect()->back()->with('alert-success', 'Success update photo profile');
    }
}
