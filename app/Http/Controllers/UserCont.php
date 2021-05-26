<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

use App\User;
use App\Role;
use App\History;
use App\MPropertySetting;
use Illuminate\Support\Facades\DB;

use Auth;

class UserCont extends Controller
{
    // Feature Master : 1
    // Feature ID
    // View : 1
    // Update : 2
    // Create : 3
    // Delete : 4

    protected $master = 1;
    protected $view = 1;
    protected $update = 2;
    protected $store = 3;
    protected $delete = 4;
    protected $table = 'users';


    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view users management page');

        return view('admin.users.users');
    }

    public function dtUsers()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = User::join('roles', 'users.role_id', 'roles.id')
                -> select('users.*', 'roles.role_name')
                -> where('users.id', '!=', Auth::user()->id)
                -> where('users.role_id', '!=', 1)
                -> get();

        // tampilkan super admin jika yang masuka dalah super admin
        if (Auth::user()->role_id == 1) {
            $data = User::join('roles', 'users.role_id', 'roles.id')
                -> select('users.*', 'roles.role_name')
                -> where('users.id', '!=', Auth::user()->id)
                -> get();
        }

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $role = '<a id="btn-a-' . $data-> id . '" onclick="openRole(' . $data-> id . ')" class="mb-2 mr-2 btn btn-primary fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Role</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $role . $delete;
        })
        -> addColumn('reset_password', function($data){
            $reset = '<a onclick="reset_password(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Reset</a>';
            return $reset;
        })
        -> addColumn('verified', function($data){
            $verify = '<i style="color: green; font-size: 20px;" class="fas fa-check-circle"></i>';
            if ($data->email_verified_at == null) {
                $verify = '-';
            }

            return $verify;
        })
        ->rawColumns(['reset_password', 'action', 'verified'])
        ->make(true);
    }

    public function ajaxRole($id = null)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $roleId = User::where('id', $id)->select('role_id')->first();

        // pengecekan ini perlu untuk menampilkan role saat menambah user
        if (!$roleId) {
            $roleId = 0;
        } else {
            $roleId = $roleId->role_id;
        }

        $allRole = Role::all();

        if (Auth::user()->role_id != 1) {
            $allRole = Role::where('id', '!=', 1)
                        -> get();
        }

        return view('admin.users.ajax-role', ['role' => $roleId, 'allRole' => $allRole]);
    }

    public function store(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'name' => 'required|max:191|string',
            'email' => 'required|max:191|string|email',
            'password' => 'required|min:8|unique:users,email',
            'role' => 'required',
        ]);

        // email check
        $uEmail = User::where('email', $request->email)->first();

        if ($uEmail) {
            return redirect()->back()->with('alert-danger', 'The email already taken by another user');
        }

        $user = null;

        DB::transaction(function () use ($request, $user) {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->get('role'),
                'provider' => 'registered by admin',
                'email_verified_at' => now(),
                'token'    => Str::random(60),
            ]);

            $property = MPropertySetting::create([
                'user_id' => $user->id
            ]);

        });



        History::MStore($this->master, 1, 'Register New User');

        return redirect()->back()->with('alert-success', 'Success add new user');
    }

    public function updateRole(Request $request, $id)
    {
        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access update page');

        $user = User::findOrFail($id);

        $user->update([
            'role_id' => $request->get('role')
        ]);

        History::MUpdate($this->master, $id, 'Update User role with ID User: '. $user->id);

        return redirect()->back()->with('alert-success', "Success update ". $user->name ."'s role");
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access delete user page');

        $data = User::find($id);
        $property = MPropertySetting::where('user_id', $id)->first();


        DB::transaction(function () use ($data, $property) {

            $data->delete();
            $property->delete();

        });

        History::MDelete($this->master, $id, 'users', 'Delete User Account', $data);

        return redirect()->back()->with('alert-success', "Success delete ". $data->name ."'s account");
    }


    public function resetPassword($id)
    {
        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access update page');

        $data = User::find($id);
        $data->update([
            'password' => Hash::make('123456'),
        ]);

        History::MUpdate($this->master, $id, 'Reset User Password with ID User: '. $data->id);

        return redirect()->back()->with('alert-success', "Success reset password ". $data->name ."'s account");
    }

}
