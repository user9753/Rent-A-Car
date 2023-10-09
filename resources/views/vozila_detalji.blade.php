@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('/css/detalji_ponude.css') }}">
<link rel="stylesheet" href="{{ asset('/css/rezervacija.css') }}">
@section('sadrzaj')
    <h2>Detalji o vozilu</h2><br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h4>Osnovne informacije o vozilu</h4>
                <div>Marka vozila: <b>{{ $podaci_o_autu['marka'] }}</b></div>
                <div>Model vozila: <b>{{ $podaci_o_autu['model'] }}</b></div>
                <div>Naziv vozila: <b>{{ $podaci_o_autu['naziv'] }}</b></div>

                <div>Karoserija: <b>{{ $detalji->karoserija }}</b></div> 

                <div>Broj vrata: <b>{{ $detalji->broj_vrata }}</b></div>
                <div>Broj sedišta: <b>{{ $detalji->broj_sedista }}</b></div>
                <div>Menjač: <b>{{ $detalji->menjac }}</b></div>
                <div>Pogon: <b>{{ $detalji->pogon }}</b></div>
                <div>Vrsta goriva: <b>{{ $detalji->vrsta_goriva }}</b></div>
            </div>

            <div class="col">
                <h4>Performanse vozila</h4>
                <div>Snaga motora (KS): <b>{{ $detalji->snaga_motora }}</b></div>
                <div>Ubrzanje od 0 do 100 km/h (s): <b>{{ $detalji->ubrazanje }}</b></div>
                <div>Maksimalna brzina (km/h): <b>{{ $detalji->maks_brzina }}</b></div>
            </div>

            <div class="col">
                <h4>Dimenzije</h4>
                <table>
                    <tr>
                        <td>Dužina (m):</td>
                        <td><b>{{ $detalji->duzina }}</b></td>
                    </tr>
                    <tr>
                        <td>Širina (m):</td>
                        <td><b>{{ $detalji->sirina }}</b></td>
                    </tr>
                    <tr>
                        <td>Visina (m):</td>
                        <td><b>{{ $detalji->visina }}</b></td>
                    </tr>
                    <tr>
                        <td>Maksimalno opterećenje (kg):</td>
                        <td><b>{{ $detalji->maks_opter }}</b></td>
                    </tr>
                    <tr>
                        <td>Težina praznog vozila (kg):</td>
                        <td><b>{{ $detalji->teznina_praznog }}</b></td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
        @include('rezervacija')
        @endsection
