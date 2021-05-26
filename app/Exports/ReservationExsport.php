<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\MReservation;
use Auth;

class ReservationExsport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MReservation::where('user_id', Auth::user()->id)->get();
    }
}
