<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VozilaDetalji extends Model
{
    use HasFactory;

    protected $table = 'detalji'; 
    protected $primaryKey = 'detalji_id';
}
