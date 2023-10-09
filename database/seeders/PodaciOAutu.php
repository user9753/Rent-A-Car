<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PodaciOAutu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingData = DB::table('podaci_o_autu') ->exists();
        if (!$existingData) {
        $podaci_o_autu = [ 
            [
            'naziv' => 'PORSCHE CAYENNE',
            'model' => 'cayenne',
            'marka' => 'porsche',
            'cena' => 150,
            'slika' => '../images/porche.png',
            ],
             [
            'naziv' => 'MB G 400d AMG 4x4',
            'model' => 'MB G 400d AMG',
            'marka' => 'mercedes',
            'cena' => 160,
            'slika' => '../images/amg.png',
        ],
       [
            'naziv' => 'GOLF 7',
            'model' => 'golf 7',
            'marka' => 'volkswagen',
            'cena' => 30,
            'slika' => '../images/golf7.png',
       ],
       [
            'naziv' => 'AUDI A4 2.0 TFSI',
            'model' => 'a4',
            'marka' => 'audi',
            'cena' => 45,
            'slika' => '../images/audia4.png',
       ],
        [
            'naziv' => 'CUPRA FORMENTOR',
            'model' => 'FORMENTOR',
            'marka' => 'CUPRA',
            'cena' => 45,
            'slika' => '../images/photocupra.png',
        ],
       [
            'naziv' => 'BMW 320Xd M Sport',
            'model' => '320Xd',
            'marka' => 'BMW',
            'cena' => 50,
            'slika' => '../images/bmw320xd.png',
       ],
       [
            'naziv' => 'RR SPORT S 3.0',
            'model' => 'RR SPORT S 3.0',
            'marka' => 'range rover',
            'cena' => 110,
            'slika' => '../images/ranfa.png',
       ],
        [
            'naziv' => 'MB GLE 300d AMG',
            'model' => 'MB GLE 300d AMG',
            'marka' => 'mercedes',
            'cena' => 170,
            'slika' => '../images/meca.png',
        ],
       [
            'naziv' => 'MB S 400d LONG AMG',
            'model' => 'MB S 400d LONG AMG',
            'marka' => 'mercedes',
            'cena' => 180,
            'slika' => '../images/meca2.png',
       ],
       [
            'naziv' => 'AUDI Q7 TDI S LINE',
            'model' => 'Q7 TDI S LINE',
            'marka' => 'AUDI',
            'cena' => 100,
            'slika' => '../images/audiq7.png',
        ],
                    
    ];
DB::table('podaci_o_autu')->insert($podaci_o_autu);
}
}
}
