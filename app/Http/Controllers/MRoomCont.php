<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Auth;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MPoint;
use App\MRoomType;
use Illuminate\Support\Facades\DB;

class MRoomCont extends Controller
{
    protected $master = 6;
    protected $view = 20;
    protected $update = 21;
    protected $store = 22;
    protected $delete = 23;
    protected $table = 'm_room_types';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        return view('reservation.room-type.room-type');
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MRoomType::where('user_id', Auth::user()->id)->get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $update . $delete;
        })
        -> addColumn('room_desc', function($data){
            return substr(strip_tags($data->room_desc),0,50)."...";
        })
        // -> addColumn('completion_m', function($data){
        //     return substr(strip_tags($data->completion),0,50)."...";
        // })
        // -> addColumn('icon', function($data){
        //     $icon = '<i class="fas '. $data->icon .'"></i>';
        //     return $icon;
        // })
        // ->rawColumns(['aktive', 'action', 'icon'])
        ->rawColumns(['action', 'question_m', 'completion_m'])
        ->make(true);
    }

    public function store(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'room_type' => 'required',
            'room_rate' => 'required',
        ]);

        // $data = FeatureCategory::create($request->all());
        // Menggunakan transaction
        DB::transaction(function () use ($request) {

            $data = MRoomType::create($request->all());

        });

        // History::MStore($this->master, $data->id, 'Add new bank data with ID: '. $data->id);

        return redirect('/admin/room-type')->with('alert-success', 'Berhasil Menambah Room');
    }

    public function update(Request $request, $id)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'room_type' => 'required',
            'room_rate' => 'required',
        ]);

        $data = MRoomType::find($id);

        DB::transaction(function () use ($request, $data, $id) {

            $dataM = $data->update($request->all());
        });

        History::MUpdate($this->master, $data->id, 'Update Room Type With ID: '. $data->id, $data);

        return redirect('/admin/room-type')->with('alert-success', 'Success update Room Type');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MRoomType::find($id);

        return view('reservation.room-type.ajax-update-room-type', ['data' => $data]);
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MRoomType::find($id);

        $data->delete();


        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, 0, 'dont_restore', 'Delete data with room id'. $data->id, $data);

        return redirect('/admin/room-type')->with('alert-success', "Success delete data");
    }
}
