<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Province;

class PublicController extends Controller
{
    public function index()
    {
        $timestamp = date("d/m/Y");
        $day       = date("l");
        $timestamp = $day . ', ' . $timestamp;

        // Show data from-to
        $provinces = Province::select('province_id', 'name')->get();
        $locations = Location::select('location_id', 'location', 'province_id', 'keterangan')->get();

        return view('welcome', ['date' => $timestamp, 'provinces' => $provinces, 'locations' => $locations]);
    }

}