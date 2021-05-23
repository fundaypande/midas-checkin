<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Auth;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MPoint;
use App\MReservation;
use Illuminate\Support\Facades\DB;

class MCheckinCont extends Controller
{
    protected $master = 8;
    protected $view = 28;
    protected $update = 29;
    protected $store = 30;
    protected $delete = 31;
    protected $table = 'm_reservations';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        return view('reservation.checkin.checkin');
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MReservation::join('m_room_types', 'm_room_types.id', 'm_reservations.room_type_id')
                                ->where('m_reservations.user_id', Auth::user()->id)->get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $update . $delete;
        })
        -> addColumn('nama', function($data){
            return $data->nama_depan . ' ' . $data->nama_belakang;
        })
        -> addColumn('room_type', function($data){
            return $data->room_type;
        })
        // -> addColumn('completion_m', function($data){
        //     return substr(strip_tags($data->completion),0,50)."...";
        // })
        // -> addColumn('icon', function($data){
        //     $icon = '<i class="fas '. $data->icon .'"></i>';
        //     return $icon;
        // })
        // ->rawColumns(['aktive', 'action', 'icon'])
        ->rawColumns(['action', 'nama'])
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

            $data = MReservation::create($request->all());

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

        $data = MReservation::find($id);

        DB::transaction(function () use ($request, $data, $id) {

            $dataM = $data->update($request->all());
        });

        History::MUpdate($this->master, $data->id, 'Update Room Type With ID: '. $data->id, $data);

        return redirect('/admin/room-type')->with('alert-success', 'Success update Room Type');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MReservation::find($id);

        return view('reservation.room-type.ajax-update-room-type', ['data' => $data]);
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MReservation::find($id);

        $data->delete();


        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, 0, 'dont_restore', 'Delete data with room id'. $data->id, $data);

        return redirect('/admin/room-type')->with('alert-success', "Success delete data");
    }
}
