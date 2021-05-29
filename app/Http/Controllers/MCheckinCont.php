<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\Exports\ReservationExsport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MPoint;
use App\MReservation;
use App\MRoomType;
use App\MPropertySetting;
use PDF;
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

    public function pdf($id)
    {
        $newId = Crypt::decryptString($id);

        $data = MReservation::join('m_room_types', 'm_room_types.id','m_reservations.room_type_id')
                            -> where('m_reservations.id', $newId)
                            -> select('m_room_types.room_type', 'm_reservations.*')
                            -> first();

        $property = MPropertySetting::where('user_id', Auth::user()->id)->first();

        $path = 'images/ttd/' . $data->email . '.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $fileData = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($fileData);

        $data['ttdimage'] = $base64;

        $pdf = PDF::loadView('reservation.checkin.pdf', ['data' => $data, 'property' => $property]);


        return $pdf->download('invoice.pdf');
    }

    public function userInputRoom($roomId)
    {
        $room = MRoomType::find($roomId);

        return $room->room_rate;
    }

    public function userInput($userId)
    {
        $room = MRoomType::where('user_id', $userId)->select('id', 'room_type')->get();

        $info = MPropertySetting::where('user_id', $userId)->first();

        return view('reservation.page.user-reservation', ['rooms' => $room, 'userId' => $userId, 'info' => $info]);
    }

    public function konfirmasi($userId)
    {
        $info = MPropertySetting::where('user_id', $userId)->first();

        // $newId = Crypt::decryptString($id);

        return view('reservation.page.konfirmasi', ['userId' => $userId, 'info' => $info]);
    }

    public function exsport()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        return Excel::download(new ReservationExsport, 'backup-reservation.xlsx');
    }

    public function dataTotal($startDate = null, $endDate = null)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $qDate = 'm_reservations.created_at BETWEEN "' . $startDate . '" AND "'. $endDate .'"';


        $data = MReservation::whereRaw($qDate)
                            -> where('m_reservations.user_id', Auth::user()->id)
                            -> sum('total_pax');

        return number_format($data,0,',','.');
    }

    public function showUpdate($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MReservation::join('m_room_types', 'm_room_types.id', 'm_reservations.room_type_id')
                            -> where('m_reservations.id', $id)
                            -> where('m_reservations.user_id', Auth::user()->id)
                            -> first();

        // dd($data);
        $room = MRoomType::select('id', 'room_type')->get();

        return view('reservation.checkin.checkin-update', ['data' => $data, 'rooms' => $room]);
    }

    public function data($startDate = null, $endDate = null)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        // $qUser      = 1;
        // $qAction    = 1;
        // $qFeature   = 1;
        // $qDate      = 1;

        // return $endDate;

        // if ($userId != '-') {
        //     $qUser = 'user_id = ' . $userId;
        // }

        // if ($action != '-') {
        //     $qAction = 'action = "' . $action . '"';
        // }

        // if ($featureId != '-') {
        //     $qFeature = 'feature_id = "' . $featureId . '"';
        // }

        $qDate = 'm_reservations.created_at BETWEEN "' . $startDate . '" AND "'. $endDate .'"';


        $data = MReservation::join('m_room_types', 'm_room_types.id', 'm_reservations.room_type_id')
                                -> select('m_room_types.room_type', 'm_reservations.*')
                                -> whereRaw($qDate)
                                -> where('m_reservations.user_id', Auth::user()->id)
                                -> get();

                                // return $data;
        // $data = History::join('feature_masters', 'feature_masters.id', 'histories.feature_id')
        //         -> join('users', 'users.id', 'histories.user_id')
        //         // -> whereRaw($qUser)
        //         // -> whereRaw($qAction)
        //         // -> whereRaw($qFeature)
        //         -> whereRaw($qDate)
        //         -> select('histories.*', 'feature_masters.feature_master_name', 'users.name')
        //         -> get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $update . $delete;
        })
        -> addColumn('pdf', function($data){
            $hiddenId = Crypt::encryptString($data->id);
            $update = '<a target="_BLANK" id="btn-a-' . $data-> id . '" href="/reservation/download-pdf/' . $hiddenId . '" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Download</a>';

          return $update;
        })
        -> addColumn('nama', function($data){
            return $data->nama_depan . ' ' . $data->nama_belakang;
        })
        ->rawColumns(['aksi', 'action', 'pdf'])
        ->make(true);
    }

    // public function data()
    // {
    //     if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

    //     $data = MReservation::join('m_room_types', 'm_room_types.id', 'm_reservations.room_type_id')
    //                             ->where('m_reservations.user_id', Auth::user()->id)->get();

    //     return Datatables::of($data)
    //     -> addColumn('action', function($data){
    //         $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
    //         $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
    //       return $update . $delete;
    //     })
    //     -> addColumn('nama', function($data){
    //         return $data->nama_depan . ' ' . $data->nama_belakang;
    //     })
    //     -> addColumn('room_type', function($data){
    //         return $data->room_type;
    //     })
    //     // -> addColumn('completion_m', function($data){
    //     //     return substr(strip_tags($data->completion),0,50)."...";
    //     // })
    //     // -> addColumn('icon', function($data){
    //     //     $icon = '<i class="fas '. $data->icon .'"></i>';
    //     //     return $icon;
    //     // })
    //     // ->rawColumns(['aktive', 'action', 'icon'])
    //     ->rawColumns(['action', 'nama'])
    //     ->make(true);
    // }

    public function store(Request $request)
    {

        // if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            // 'room_type' => 'required',
            // 'room_rate' => 'required',
        ]);

        // $newId = '';
        // dd($request->all());

        // return $request->all();

        // $data = FeatureCategory::create($request->all());
        // Menggunakan transaction
        // DB::transaction(function () use ($request) {


            // $image = Image::make($request->get('signed'));
            // $image->save('images/ttd/bar.jpg');

            // upload ttd
            $folderPath = public_path('images/ttd/');

            $image_parts = explode(";base64,", $request->signed);

            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);

            $file = $folderPath . $request->email . '.'.$image_type;
            file_put_contents($file, $image_base64);

            // end upload ttd
            unset($request["signed"]);
            unset($request["output"]);
            $data = MReservation::create($request->all());



            // $newId = Crypt::decrypt($data->id);
            // dd($data->id);
        // });



        // History::MStore($this->master, $data->id, 'Add new bank data with ID: '. $data->id);
        return response()->json($data);
        // return redirect('/page/konfirmasi/' . $request->user_id)->with('alert-success', 'Success input reservation form');
    }

    public function update(Request $request, $id)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            // 'room_type' => 'required',
            // 'room_rate' => 'required',
        ]);

        $data = MReservation::find($id);

        DB::transaction(function () use ($request, $data, $id) {

            $dataM = $data->update($request->all());
        });

        History::MUpdate($this->master, $data->id, 'Update Reservation With ID: '. $data->id, $data);

        return redirect('/admin/checkin-repport')->with('alert-success', 'Success update Reservation');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MReservation::find($id);

        return view('reservation.checkin.ajax-update-checkin', ['data' => $data]);
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
