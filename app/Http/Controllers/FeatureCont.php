<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\User;
use App\Feature;
use App\FeatureMaster;
use App\FeatureCategory;
use App\History;

class FeatureCont extends Controller
{
    protected $master = 5;
    protected $view = 15;
    protected $update = 16;
    protected $store = 17;
    protected $delete = 18;
    protected $tableFeature = 'features';
    protected $tableMaster = 'feature_masters';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $featureCat = FeatureCategory::select('id', 'feature_category_name')
                        -> get();

        return view('admin.feature.feature-master', ['featureCat' => $featureCat]);
    }

    public function detail($id)
    {
        // $id adalah id dari 'feature_masters' jadi akan di tampilkan fitur-fitur sesuai fitur master

        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $master = FeatureMaster::find($id);
        // dd($master);
        $features = Feature::where('feature_master_id', $id)
                    -> get();

        return view('admin.feature.feature-detail', ['master' => $master, 'features' => $features, 'id' => $id]);
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = FeatureMaster::join('feature_categories', 'feature_categories.id', 'feature_masters.feature_category_id')
                -> select('feature_masters.*', 'feature_categories.feature_category_name')
                -> latest() ->get();

        return Datatables::of($data)
        -> addColumn('features', function($data){
            $detail = '<a id="btn-a-' . $data-> id . '" href="/admin/feature/' . $data-> id .'" class="mb-2 mr-2 btn btn-primary fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Detail</a>';
          return $detail;
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
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
            return $update . $delete;
        })
        ->rawColumns(['aktive', 'action', 'features'])
        ->make(true);
    }

    public function dataDetail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = Feature::join('feature_masters', 'feature_masters.id', 'features.feature_master_id')
                -> select('features.*', 'feature_masters.feature_master_name')
                -> where('feature_master_id', $id)
                -> get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
            return $update . $delete;
        })
        -> addColumn('general', function($data){
            $dataGeneral = $data->general;
            $checked = $dataGeneral == 1 ? 'checked' : '';
            $general = '<input class="form-check-input" type="checkbox" id="" value="option2" disable '.  $checked .'>';
            return $general;
        })
        -> addColumn('in_menu', function($data){
            $dataMenu = $data->in_menu;
            $checked = $dataMenu == 1 ? 'checked' : '';
            $menu = '<input class="form-check-input" type="checkbox" id="" value="option2" '.  $checked .'>';
            return $menu;
        })
        -> addColumn('aktive', function($data){
            $dataAktive = $data->aktive;
            $checked = $dataAktive == 1 ? 'checked' : '';
            $aktive = '<input class="form-check-input" type="checkbox" id="" value="option2" '.  $checked .'>';
            return $aktive;
        })
        ->rawColumns(['aktive', 'general', 'in_menu', 'aktive', 'action'])
        ->make(true);
    }

    public function storeMaster(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'feature_master_name' => 'required|max:191|string',
            'feature_category_id' => 'required|max:191',
            'slug' => 'required|max:191|string',
        ]);

        $data = FeatureMaster::create($request->all());

        // create 4 base feature of system (CRUD)
        $crud = ['Show', 'Create', 'Update', 'Delete'];

        foreach ($crud as $key => $value) {
            Feature::create([
                'feature_name'      => $value . ' ' . $request->feature_master_name,
                'feature_master_id' => $data->id,
                'general'           => 0,
                'in_menu'           => $value == 'Show' ? 1 : 0,
                'aktive'            => 1,
                'description'       => $value . ' ' . $request->feature_master_name. ' Managements',
            ]);

            History::MStore($this->master, $data->id, 'Create New Feature with name: '. $value . ' ' . $request->feature_master_name);
        }

        History::MStore($this->master, $data->id, 'Create New Feature Master with name: '. $data->feature_master_name);

        return redirect('/admin/feature')->with('alert-success', 'Success create new feature master');
    }


    // store to 'features' table
    public function store(Request $request)
    {
        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'feature_name' => 'required|max:191|string',
            'feature_master_id' => 'required|max:191',
        ]);

        $general = $request->has('general') ? 1 : 0;
        $inMenu = $request->has('in_menu') ? 1 : 0;
        $active = $request->has('aktive') ? 1 : 0;

        $data = Feature::create([
            'feature_name'          => $request->feature_name,
            'feature_master_id'     => $request->feature_master_id,
            'description'           => $request ->feature_description,
            'general'               => $general,
            'in_menu'               => $inMenu,
            'aktive'                => $active
        ]);

        History::MStore($this->master, $data->id, 'Create New Feature with name: '. $data->feature_name);

        return redirect('/admin/feature/'.$request->feature_master_id)->with('alert-success', 'Success create new feature');
    }


    public function updateMaster(Request $request, $id)
    {
        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

            $validatedData = $request->validate([
                'feature_master_name' => 'required|max:191|string',
                'feature_category_id' => 'required|max:191',
                'slug' => 'required|max:191|string',
            ]);

            $data = FeatureMaster::find($id);

            History::MUpdate($this->master, $data->id, 'Update Feature with name: '. $data->feature_master_name, $data);

            $data -> update($request->all());

            return redirect('/admin/feature/')->with('alert-success', 'Success update feature master');
    }

        // store to 'features' table
        public function update(Request $request, $id)
        {
            if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

            $validatedData = $request->validate([
                'feature_name' => 'required|max:191|string',
            ]);

            $general = $request->has('general') ? 1 : 0;
            $inMenu = $request->has('in_menu') ? 1 : 0;
            $active = $request->has('aktive') ? 1 : 0;

            $data = Feature::find($id);

            History::MUpdate($this->master, $data->id, 'Update Feature with name: '. $data->feature_name, $data);

            $data -> update([
                'feature_name'          => $request->feature_name,
                'description'           => $request ->feature_description,
                'general'               => $general,
                'in_menu'               => $inMenu,
                'aktive'                => $active
            ]);

            return redirect('/admin/feature/'.$data->feature_master_id)->with('alert-success', 'Success update feature');
        }

    public function ajaxFeature($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = Feature::find($id);

        return view('admin.feature.ajax-update-feature', ['data' => $data]);
    }

    public function ajaxFeatureMaster($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = FeatureMaster::find($id);
        $featureCat = FeatureCategory::select('id', 'feature_category_name')
                        -> get();

        return view('admin.feature.ajax-update-feature-master', ['data' => $data, 'featureCat' => $featureCat]);
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = Feature::find($id);
        $data->delete();

        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, $id, $this->tableFeature, 'Delete Feature With Name: '. $data->feature_name, $data);

        return redirect('/admin/feature-cat')->with('alert-success', "Success delete ". $data->feature_name ."'s features");
    }

    public function destroyMaster($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = FeatureMaster::find($id);
        $data->delete();

        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, $id, $this->tableMaster, 'Delete Feature Master With Name: '. $data->feature_master_name, $data);

        return redirect('/admin/feature-cat')->with('alert-success', "Success delete ". $data->feature_master_name ."'s features");
    }
}
