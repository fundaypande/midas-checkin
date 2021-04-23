<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MPoint;
use App\MQuestion;
use Illuminate\Support\Facades\DB;

class MBankController extends Controller
{
    protected $master = 6;
    protected $view = 20;
    protected $update = 21;
    protected $store = 22;
    protected $delete = 23;
    protected $table = 'm_questions';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        return view('midnersi.bank-soal.bank-soal');
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MQuestion::select('id', 'question', 'correct_answare', 'completion')
                ->latest()->get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $update . $delete;
        })
        -> addColumn('question_m', function($data){
            return substr(strip_tags($data->question),0,50)."...";
        })
        -> addColumn('completion_m', function($data){
            return substr(strip_tags($data->completion),0,50)."...";
        })
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
            'question' => 'required|string',
            'correct_answare' => 'required|string',
        ]);

        // $data = FeatureCategory::create($request->all());
        // Menggunakan transaction
        DB::transaction(function () use ($request) {

            $data = MQuestion::create([
                'question' => $request->question,
                'correct_answare' => $request->correct_answare,
                'completion' => $request->completion,
            ]);
            $opsi = ['A', 'B', 'C', 'D', 'E'];
            for ($i=0; $i < count($request->point); $i++) {
                $point = MPoint::create([
                    'question_id' => $data->id,
                    'point' => $opsi[$i],
                    'point_description' => $request->point[$i]
                ]);
            }
        });

        // History::MStore($this->master, $data->id, 'Add new bank data with ID: '. $data->id);

        return redirect('/admin/bank-soal')->with('alert-success', 'Berhasil Menambah Bank Soal');
    }

    public function update(Request $request, $id)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'question' => 'required|string',
            'correct_answare' => 'required|string',
        ]);

        $data = MQuestion::find($id);

        DB::transaction(function () use ($request, $data, $id) {

            $dataM = $data->update([
                'question' => $request->question,
                'correct_answare' => $request->correct_answare,
                'completion' => $request->completion,
            ]);
            $opsi = ['A', 'B', 'C', 'D', 'E'];
            for ($i=0; $i < count($request->point); $i++) {
                $dataOpsi = MPoint::where('question_id', $id)
                            -> where('point', $opsi[$i])
                            -> first();
                $point = $dataOpsi->update([
                    'point' => $opsi[$i],
                    'point_description' => $request->point[$i]
                ]);
            }
        });

        History::MUpdate($this->master, $data->id, 'Update Bank Soal With ID: '. $data->id, $data);

        return redirect('/admin/bank-soal')->with('alert-success', 'Success update bank soal');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MQuestion::find($id);
        $opsi = MPoint::select('point', 'point_description')
                        -> where('question_id', $id)
                        -> get();

        return view('midnersi.bank-soal.ajax-update-bank-soal', ['data' => $data, 'opsi' => $opsi]);
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MQuestion::find($id);

        DB::transaction(function () use ($id, $data) {
            $data->delete();

            $opsi = MPoint::where('question_id', $id);

            $opsi->delete();
        });

        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, 0, 'dont_restore', 'Delete data with question'. $data->question, $data);

        return redirect('/admin/bank-soal')->with('alert-success', "Success delete data");
    }
}
