<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\FeatureCategory;
use App\FeatureMaster;
use App\History;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }


    protected $users = 1;
    protected $edData = 20;
    protected $group = 5;
    protected $featureCategory = 11;
    protected $featureMaster = 15;
    protected $history = 9;
    protected $discussion = 28;

    public function index()
    {

        return view('admin.dashboard.dashboard');
    }


    public function home()
    {
        return view('reservation.home2');
    }


    public function fUser()
    {
        if (!User::Role($this->users)) return '';

        $data = User::all();

        return view('admin.dashboard.view-user', ['data' => $data]);
    }

    public function fGroup()
    {
        if (!User::Role($this->group)) return '';

        $data = Role::all();

        return view('admin.dashboard.view-group', ['data' => $data]);
    }

    public function fFeatureCategory()
    {
        if (!User::Role($this->featureCategory)) return '';

        $data = FeatureCategory::all();

        return view('admin.dashboard.view-feature-category', ['data' => $data]);
    }

    public function fFeatureMaster()
    {
        if (!User::Role($this->featureMaster)) return '';

        $data = FeatureMaster::all();

        return view('admin.dashboard.view-feature-master', ['data' => $data]);
    }

    public function history()
    {
        if (!User::Role($this->history)) return '';

        $data = History::join('users', 'users.id', 'histories.user_id')
                -> select('histories.*', 'users.name', 'users.photo', 'users.provider')
                -> orderBy('histories.id', 'desc')
                -> limit(5)
                -> get();


        return view('admin.dashboard.view-history', ['data' => $data]);
    }
}
