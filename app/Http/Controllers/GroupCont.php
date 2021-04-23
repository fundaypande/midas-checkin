<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\User;
use App\History;
use App\Role;
use App\RoleAccess;
use App\Feature;
use App\FeatureMaster;

use Auth;

class GroupCont extends Controller
{
    // Gorups adalah management role di tabel 'roles'
    protected $master = 2;
    protected $view = 5;
    protected $update = 7;
    protected $store = 6;
    protected $delete = 8;
    protected $updateAccess = 19;
    protected $table = 'roles';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        return view('admin.group.group');
    }

    public function access($id)
    {
        if (!User::Role($this->updateAccess)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        if ($id == 1) {
            if (Auth::user()->role_id != 1) {
                return redirect()->back()->with('alert-danger', 'You are not super admin');
            }
        }

        $role = Role::find($id);

        //fitur yang akan dicentang
        $features = Feature::where('general', '=', '0')
                    ->where('features.aktive', '=', 1)
                    ->orderBy('feature_name')
                    ->get();

        // fitur yang sudah dimiliki oleh pengguna yang akan dirubah datanya
        $roleAccess = RoleAccess::where('role_id', $id)
            ->select('feature_id')
            ->get();

        $featureMaster = FeatureMaster::leftJoin('features', 'features.feature_master_id', 'feature_masters.id')
                        -> select('feature_masters.*')
                        -> where('features.aktive', 1)
                        -> distinct()
                        -> get();

        $roleIdFitur = [];
        foreach ($roleAccess as $key => $value) {
            $roleIdFitur[$key] = $value->feature_id;
        }

        // dd($roleIdFitur);

        return view('admin.group.group-access', ['role' => $role, 'features' => $features, 'roleAccess' => $roleIdFitur, 'master' => $featureMaster]);
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = Role::all();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
            if ($data -> id == 1 || $data -> id == 2 || $data -> id == 3) {
                $update = '-';
                $delete = '';
            }
            return $update . $delete;
        })
        -> addColumn('access', function($data){

            $access = '<a id="btn-a-' . $data-> id . '" href="/admin/groups/access/'. $data-> id .'" class="mb-2 mr-2 btn btn-primary fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Group Access</a>';
            if (Auth::user()->role_id != 1) {
                if ($data -> id == 1) {
                    $access = '-';
                }
            }
            return $access;
        })
        -> addColumn('aktive', function($data){
            $aktiveData = $data->role_status;
            $aktive = '';
            if ($aktiveData == 1) {
                $aktive = '<div class="badge badge-primary">Active</div>';
            } else {
                $aktive = '<div class="badge badge-danger">Hidden</div>';
            }
            return $aktive;
        })
        ->rawColumns(['aktive', 'action', 'access'])
        ->make(true);
    }

    public function store(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'role_name' => 'required|max:191|string',
        ]);

        $data = Role::create($request->all());

        History::MStore($this->master, $data->id, 'Create new user group with name: '. $data->role_name);

        return redirect('/admin/groups')->with('alert-success', 'Success add new feature category');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = Role::find($id);

        return view('admin.group.ajax-update-group', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'role_name' => 'required|max:191|string',
        ]);

        $data = Role::find($id);

        History::MUpdate($this->master, $data->id, 'Update Feature Category with name: '. $data->role_name, $data);

        $data->update($request->all());

        return redirect('/admin/groups')->with('alert-success', 'Success update user group');
    }

    public function updateAccess(Request $request, $id)
    {
        // dd($request->all());

        $dataFeatures = $request->features;

        $deleteAllRole = RoleAccess::where('role_id', $id)->delete();

        foreach ($dataFeatures as $key => $value) {
          $create = RoleAccess::create([
            'role_id' => $id,
            'feature_id' => $value,
          ]);
        }

        History::MUpdate($this->master, $id, 'Update user group access with ID: '. $id, 'data');

        return redirect()->back()->with('alert-success', 'Success update user group');
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = Role::find($id);
        $data->delete();

        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, $id, $this->table, 'Delete User Group With Name: '. $data->role_name, $data);

        return redirect('/admin/feature-cat')->with('alert-success', "Success delete ". $data->role_name ."'s user group");
    }

}
