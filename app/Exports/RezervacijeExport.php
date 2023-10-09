<?php

namespace App\Exports;

use App\Models\Rezervacija;
use Maatwebsite\Excel\Concerns\FromCollection;

class RezervacijeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rezervacija::all();
    }
}
