<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\User;
use App\FeatureCategory;
use App\History;

class FeatureCatCont extends Controller
{
    protected $master = 4;
    protected $view = 11;
    protected $update = 12;
    protected $store = 13;
    protected $delete = 14;
    protected $table = 'feature_categories';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        return view('admin.featurecat.featurecat');
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = FeatureCategory::latest()->get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $update . $delete;
        })
        -> addColumn('aktive', function($data){
            $aktiveData = $data->aktive;
            $aktive = '';
            if ($aktiveData == 1) {
                $aktive = '<div class="badge badge-primary">Active</div>';
            } else {
                $aktive = '<div class="badge badge-danger">Hidden</div>';
            }
            return $aktive;
        })
        -> addColumn('icon', function($data){
            $icon = '<i class="fas '. $data->icon .'"></i>';
            return $icon;
        })
        ->rawColumns(['aktive', 'action', 'icon'])
        ->make(true);
    }

    public function store(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'feature_category_name' => 'required|max:191|string',
        ]);

        $data = FeatureCategory::create($request->all());

        History::MStore($this->master, $data->id, 'Register New Feature Category with name: '. $data->feature_category_name);

        return redirect('/admin/feature-cat')->with('alert-success', 'Success add new feature category');
    }

    public function update(Request $request, $id)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'feature_category_name' => 'required|max:191|string',
        ]);

        $data = FeatureCategory::find($id);

        History::MUpdate($this->master, $data->id, 'Update Feature Category with name: '. $data->feature_category_name, $data);

        $data->update($request->all());

        return redirect('/admin/feature-cat')->with('alert-success', 'Success update feature category');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = FeatureCategory::find($id);

        return view('admin.featurecat.ajax-update-featurecat', ['data' => $data]);
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = FeatureCategory::find($id);
        $data->delete();

        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, $id, 'feature_categories', 'Delete Feature Category With Name: '. $data->feature_category_name, $data);

        return redirect('/admin/feature-cat')->with('alert-success', "Success delete ". $data->feature_category_name ."'s features");
    }
}
