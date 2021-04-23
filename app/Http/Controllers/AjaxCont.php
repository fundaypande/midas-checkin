<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Auth;

class AjaxCont extends Controller
{
    public function nationality()
    {
        $userNationality = Auth::user()->nationality;
        $data = Country::select('en_short_name')->get();
        return view('ajax.ajax-nationality', ['datas' => $data, 'userNationality' => $userNationality]);
    }
}
