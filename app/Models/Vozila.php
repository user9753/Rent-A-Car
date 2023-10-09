<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vozila extends Model
{

    use HasFactory;
    public $table = 'podaci_o_autu';

    public static function getAll()
    {
        return DB::table('podaci_o_autu')->get();
        
    }

    public static function getPodaciOAutoru($id)
    {
        return self::find($id);
    }

    public static function getDetalji($id)
    {
        return DB::table('detalji')->where('detalji_id', $id)->first();
    }

    public function removeCar($id)
    {
        $car = $this->find($id);
    if ($car) {
        $car->save();
        return true;
    }
    return false;
}

public function rezervacije()
{
    return $this->hasMany(Rezervacija::class, 'id_vozila');
}

}

