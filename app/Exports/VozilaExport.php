<?php

namespace App\Exports;

use App\Models\Vozila;
use Maatwebsite\Excel\Concerns\FromCollection;

class VozilaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vozila::all();
    }
}
