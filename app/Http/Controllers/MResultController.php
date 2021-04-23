<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

use App\User;
use App\FeatureCategory;
use App\History;
use App\MDiscussion;
use App\MUserResult;
use Auth;


class MResultController extends Controller
{
    protected $master = 8;
    protected $view = 30;
    protected $store = 31;
    protected $table = 'm_user_result';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');
        if (Auth::user()->role_id != 1) return redirect()->back()->with('alert-danger', 'You cannot access this page');


        return view('midnersi.result.result');
    }

    public function showUser()
    {
        // if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MUserResult::select('result', 'm_user_results.created_at', 'test_name', 'test_id')
                            -> join('m_tests', 'm_tests.id', 'm_user_results.test_id')
                            -> where('user_id', Auth::user()->id)
                            -> get();

        return view('midnersi.result.result-user', ['data' => $data]);
    }

    public function data()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $data = MUserResult::select('test_name', 'users.name', 'users.email', 'm_user_results.id', 'result', 'm_user_results.created_at')
                            -> join('users', 'users.id', 'm_user_results.user_id')
                            -> join('m_tests', 'm_tests.id', 'm_user_results.test_id')
                            -> orderBy('m_user_results.user_id')
                            // -> distinct()
                            -> get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $detail = '<a id="btn-a-' . $data-> profile_id . '" onclick="detail(' . $data-> id . ')" class="mb-2 mr-2 btn btn-success fun-color-button nde-white"><i class="fun-icon pe-7s-edit"></i>Detail</a>';
          return $detail;
        })
        // -> addColumn('nama_pesan', function($data){
        //     $readed = MDiscussion::select('readed')
        //                             -> where('profile_id', $data->id)
        //                             -> where('is_admin', null)
        //                             -> where('readed', 0)
        //                             -> first();
        //     $name = $data->name;
        //     if ($readed) {
        //         $name = $data->name . " - <span style='color:red'>Pesan baru</span>";
        //     }

        //     return $name;
        // })
        ->rawColumns(['action'])
        ->make(true);
    }
}
