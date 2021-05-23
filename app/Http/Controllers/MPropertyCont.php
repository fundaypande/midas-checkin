<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Auth;

use App\User;
use App\FeatureCategory;
use App\History;
Use App\MPropertySetting;
use Illuminate\Support\Facades\DB;

class MPropertyCont extends Controller
{
    protected $master = 7;
    protected $view = 24;
    protected $update = 25;
    protected $store = 26;
    protected $delete = 27;
    protected $table = 'm_property_settings';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MPropertySetting::where('user_id', Auth::user()->id)->first();

        return view('reservation.property-setting.property-setting', ['data' => $data]);
    }

    // public function data()
    // {
    //     if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

    //     $data = MRoomType::where('user_id', Auth::user()->id)->get();

    //     return Datatables::of($data)
    //     -> addColumn('action', function($data){
    //         $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
    //         $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
    //       return $update . $delete;
    //     })
    //     -> addColumn('room_desc', function($data){
    //         return substr(strip_tags($data->room_desc),0,50)."...";
    //     })
    //     // -> addColumn('completion_m', function($data){
    //     //     return substr(strip_tags($data->completion),0,50)."...";
    //     // })
    //     // -> addColumn('icon', function($data){
    //     //     $icon = '<i class="fas '. $data->icon .'"></i>';
    //     //     return $icon;
    //     // })
    //     // ->rawColumns(['aktive', 'action', 'icon'])
    //     ->rawColumns(['action', 'question_m', 'completion_m'])
    //     ->make(true);
    // }

    // public function store(Request $request)
    // {

    //     if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

    //     $validatedData = $request->validate([
    //         'room_type' => 'required',
    //         'room_rate' => 'required',
    //     ]);

    //     // $data = FeatureCategory::create($request->all());
    //     // Menggunakan transaction
    //     DB::transaction(function () use ($request) {

    //         $data = MRoomType::create($request->all());

    //     });

    //     // History::MStore($this->master, $data->id, 'Add new bank data with ID: '. $data->id);

    //     return redirect('/admin/room-type')->with('alert-success', 'Berhasil Menambah Room');
    // }

    public function update(Request $request)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'owner_name' => 'required',
            'property_name' => 'required',
            'property_adress' => 'required',
            'billing_info' => 'required',
        ]);

        $data = MPropertySetting::where('user_id', Auth::user()->id)->first();

        DB::transaction(function () use ($request, $data) {

            $dataM = $data->update($request->all());
        });

        History::MUpdate($this->master, $data->id, 'Update Property Type With ID: '. $data->id, $data);

        return redirect('/admin/property-setting')->with('alert-success', 'Success update Property Setting');
    }

    // public function detail($id)
    // {
    //     if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

    //     $data = MRoomType::find($id);

    //     return view('reservation.room-type.ajax-update-room-type', ['data' => $data]);
    // }

    // public function destroy($id)
    // {
    //     if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

    //     $data = MRoomType::find($id);

    //     $data->delete();


    //     // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
    //     History::MDelete($this->master, 0, 'dont_restore', 'Delete data with room id'. $data->id, $data);

    //     return redirect('/admin/room-type')->with('alert-success', "Success delete data");
    // }
}
