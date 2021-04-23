<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MQuestion;
use App\MTest;
use App\MTestQuestion;

class MTestController extends Controller
{
    protected $master = 7;
    protected $view = 24;
    protected $update = 25;
    protected $store = 26;
    protected $delete = 27;
    protected $table = 'm_tests';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        return view('midnersi.test.test');
    }

    public function soal($id)
    {
        # menampilkan data soal yang akan dipilih untuk group test tertentu
        $soal = MQuestion::select('id', 'question')->get();
        $data = MTest::select('id', 'test_name')
                        -> where('id', $id)
                        -> first();

        $testSoal = MTestQuestion::select('question_id')
                                    -> where('test_id', $id)
                                    -> get();

        return view('midnersi.test.test-soal', ['soal' => $soal, 'data' => $data, 'testSoal' => $testSoal]);
    }

    public function soalStore(Request $request)
    {
        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'test_id' => 'required',
            'total' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            $dataQuestion = $request->question_id;
            $testId = $request->test_id;

            // remove all value
            $testQuestion = MTestQuestion::where('test_id', $testId);
            $testQuestion -> delete();

            for ($i=0; $i < count($dataQuestion); $i++) {
                MTestQuestion::create([
                    'test_id' => $testId,
                    'question_id' => $dataQuestion[$i]
                ]);
            }

            $test = MTest::select('id')->where('id', $testId)->first();
            $test->update([
                'total' => $request->total
            ]);
        });

        return redirect('/admin/test/soal/' . $request->test_id)->with('alert-success', 'Success update soal');
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = Mtest::latest()->get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $soal = '<a id="btn-a-' . $data-> id . '" onclick="soal(' . $data-> id . ')" class="mb-2 mr-2 btn btn-primary fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Soal</a>';
            $update = '<a id="btn-a-' . $data-> id . '" onclick="update(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Update</a>';
            $delete = '<a onclick="deleteData(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Delete</a>';
          return $soal . $update . $delete;
        })
        -> addColumn('test_description_m', function($data){
            return substr(strip_tags($data->test_description),0,50)."...";
        })
        -> addColumn('test_name_m', function($data){
            $gratis = '';
            if ($data -> free == 1) {
                $gratis = '- GRATIS';
            }
            return $data->test_name . ' ' . $gratis;
        })
        ->rawColumns(['test_description_m', 'action', 'test_name_m'])
        ->make(true);
    }

    public function store(Request $request)
    {

        if (!User::Role($this->store)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'test_name' => 'required|max:191|string',
            'test_time' => 'required|numeric',
        ]);

        $data = MTest::create($request->all());

        History::MStore($this->master, $data->id, 'Register New Test with ID: '. $data->id);

        return redirect('/admin/test')->with('alert-success', 'Success add new test');
    }

    public function update(Request $request, $id)
    {

        if (!User::Role($this->update)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $validatedData = $request->validate([
            'test_name' => 'required|max:191|string',
            'test_time' => 'required|numeric',
        ]);

        // dd($request->exists('free'));
        if ($request->exists('free')) {
            # ada nilai free maka: free = 1
            $request['free'] = 1;
        } else {
            $request['free'] = 0;
        }

        $data = MTest::find($id);

        History::MUpdate($this->master, $data->id, 'Update Test Group with ID: '. $data->id, $data);

        $data->update($request->all());

        return redirect('/admin/test')->with('alert-success', 'Success update test');
    }

    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access view feature management page');

        $data = MTest::find($id);

        return view('midnersi.test.ajax-update-test', ['data' => $data]);
    }

    public function destroy($id)
    {
        if (!User::Role($this->delete)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MTest::find($id);
        $data->delete();

        // ketika delete table, history juga harus meyimpan nama tabel yang dihapus untuk bisa direstore kembali
        History::MDelete($this->master, $id, $this->table, 'Delete test with ID: '. $data->id, $data);

        return redirect('/admin/feature-cat')->with('alert-success', "Success delete ". $data->test_name ."'s data");
    }
}
