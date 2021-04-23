<?php

namespace App\Http\Controllers;

use App\FeatureMaster;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;


use App\User;
use App\History;

class HistoryCont extends Controller
{

    protected $master = 3;
    protected $view = 9;
    protected $restore = 10;
    protected $table = 'histories';

    public function show()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access history management page');

        $user = User::select('name', 'id')
                -> get();

        $feature = FeatureMaster::select('feature_master_name', 'id')
                    -> get();



        return view('admin.history.history', ['user' => $user, 'feature' => $feature]);
    }

    public function single()
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access history management page');

        return view('admin.history.single');
    }


    public function detail($id)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access history management page');

        $history = History::find($id);

        return view('admin.history.history-detail-ajax', ['history' => $history]);
    }


    public function data($userId = null, $action = null, $featureId = null, $startDate = null, $endDate = null)
    {
        if (!User::Role($this->view)) return redirect()->back()->with('alert-danger', 'You cannot access this page');

        $qUser      = 1;
        $qAction    = 1;
        $qFeature   = 1;
        $qDate      = 1;

        if ($userId != '-') {
            $qUser = 'user_id = ' . $userId;
        }

        if ($action != '-') {
            $qAction = 'action = "' . $action . '"';
        }

        if ($featureId != '-') {
            $qFeature = 'feature_id = "' . $featureId . '"';
        }

        if ($startDate != '-') {
            $qDate = 'histories.created_at BETWEEN "' . $startDate . '" AND "'. $endDate .'"';
        }

        $data = History::join('feature_masters', 'feature_masters.id', 'histories.feature_id')
                -> join('users', 'users.id', 'histories.user_id')
                -> whereRaw($qUser)
                -> whereRaw($qAction)
                -> whereRaw($qFeature)
                -> whereRaw($qDate)
                -> select('histories.*', 'feature_masters.feature_master_name', 'users.name')
                -> get();

        return Datatables::of($data)
        -> addColumn('action', function($data){
            $delete = '';
            $detail = '<a onclick="detail(' . $data-> id . ')" class="mb-2 mr-2 btn btn-primary fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Detail</a>';
            if ($data->action == 'delete' && $data->restored == 0) {
                $delete = '<a onclick="restore(' . $data-> id . ')" class="mb-2 mr-2 btn btn-danger fun-color-button nde-white"><i class="fun-icon pe-7s-trash"></i>Restore</a>';
            }

            return $detail.$delete;
        })
        -> addColumn('aksi', function($data){
            $aksiData = $data->action;
            $aksiShow = '';
            if ($aksiData == 'store') {
                $aksiShow = '<div class="badge badge-primary">'. $aksiData .'</div>';
            } elseif ($aksiData == 'update'){
                $aksiShow = '<div class="badge nde-white" style="background-color: #7ef78f !important;">'. $aksiData .'</div>';
            } elseif ($aksiData == 'delete'){
                $aksiShow = '<div class="badge badge-danger">'. $aksiData .'</div>';
            } elseif ($aksiData == 'restore'){
                $aksiShow = '<div class="badge badge-warning">'. $aksiData .'</div>';
            }

            return $aksiShow;
        })
        ->rawColumns(['aksi', 'action'])
        ->make(true);
    }

    public function restore($id)
    {
        $data = History::DoRestore($id);

        return 'success';
    }

}
