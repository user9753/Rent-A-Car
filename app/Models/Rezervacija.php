<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    use HasFactory;
    protected $table = 'rezervacije';

    protected $fillable = [
        'id_korisnika',
        'id_vozila',
        'from_date',
        'to_date',
        'message',
        'current_price',
        'accepted'
    ];

    public function izracunajCenu()
    {
        $fromDate = \Carbon\Carbon::parse($this->from_date);
        $toDate = \Carbon\Carbon::parse($this->to_date);
        $diffDays = $toDate->diffInDays($fromDate);

        $car = Vozila::find($this->id_vozila);

        if ($car) {
            return $diffDays * $car->cena;
        } else {
            return 0;
        }
    }
}
