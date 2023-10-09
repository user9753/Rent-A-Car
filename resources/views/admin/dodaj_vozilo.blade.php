@extends('admin.header')
<link rel="stylesheet" href="{{ asset('/css/admin/dodaj_vozila.css') }}">
@section('sadrzaj')
    <h1>Dodaj vozilo</h1>

    <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Naziv: <input type="text" name="naziv" value="{{ old('naziv') }}"><span class="err" id="err_naziv">* {{ $errors->first('naziv') }}</span></p>
        @if ($poljeErr && empty(old('naziv')))
            <span class="err">{{ $poljeErr }}</span>
        @endif
        <p>Model: <input type="text" name="model" value="{{ old('model') }}"><span class="err" id="err_model">* {{ $errors->first('model') }}</span></p>
        @if ($poljeErr && empty(old('model')))
            <span class="err">{{ $poljeErr }}</span>
        @endif
        <p>Marka: <input type="text" name="marka" value="{{ old('marka') }}"><span class="err" id="err_marka">* {{ $errors->first('marka') }}</span></p>
        @if ($poljeErr && empty(old('marka')))
            <span class="err">{{ $poljeErr }}</span>
        @endif
        <p>Cena: <input type="text" name="cena" value="{{ old('cena') }}"><span class="err" id="err_cena">* {{ $errors->first('cena') }}</span></p>
        @if ($poljeErr && empty(old('cena')))
            <span class="err">{{ $poljeErr }}</span>
        @endif
        <p>Karoserija: <input type="text" name="karoserija" value="{{ isset($karoserija) ? $karoserija : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>

        <p>Broj vrata:
            <input type="radio" name="broj_vrata" value="3" {{ isset($broj_vrata) && $broj_vrata == '3' ? 'checked' : '' }}>3
            <input type="radio" name="broj_vrata" value="5" {{ isset($broj_vrata) && $broj_vrata == '5' ? 'checked' : 'checked' }}>5
        </p>
        
        <p>Broj sedišta: <input type="number" name="broj_sedista" value="{{ isset($broj_sedista) ? $broj_sedista : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>
        
        <p>Menjač:
            <input type="radio" name="menjac" value="Manuelni" {{ isset($menjac) && $menjac == 'Manuelni' ? 'checked' : 'checked' }}>Manuelni
            <input type="radio" name="menjac" value="Automatski" {{ isset($menjac) && $menjac == 'Automatski' ? 'checked' : '' }}>Automatski
        </p>
        
        <p>Vrsta goriva: <input type="text" name="vrsta_goriva" value="{{ isset($vrsta_goriva) ? $vrsta_goriva : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>
        
        <p>Potrošnja: <input type="text" name="potrosnja" value="{{ isset($potrosnja) ? $potrosnja : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>
        
        <p>Klima:
            <input type="radio" name="klima" value="Manuelni" {{ isset($klima) && $klima == 'Manuelni' ? 'checked' : '' }}>Manuelni
            <input type="radio" name="klima" value="Automatski" {{ isset($klima) && $klima == 'Automatski' ? 'checked' : 'checked' }}>Automatski
            <input type="radio" name="klima" value="ne" {{ isset($klima) && $klima == 'ne' ? 'checked' : '' }}>Ne
        </p>
        
        <p>Pogon:
            <input type="radio" name="pogon" value="Prednji" {{ isset($pogon) && $pogon == 'Prednji' ? 'checked' : 'checked' }}>Prednji
            <input type="radio" name="pogon" value="zadnji" {{ isset($pogon) && $pogon == 'zadnji' ? 'checked' : '' }}>Zadnji
            <input type="radio" name="pogon" value="4x4" {{ isset($pogon) && $pogon == '4x4' ? 'checked' : '' }}>4x4
        </p>
        
        <p>Snaga motora: <input type="text" name="snaga_motora" value="{{ isset($snaga_motora) ? $snaga_motora : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>
        
        <p>Ubrzanje: <input type="text" name="ubrazanje" value="{{ isset($ubrazanje) ? $ubrazanje : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>
        
        <p>Maksimalna brzina: <input type="text" name="maks_brzina" value="{{ isset($maks_brzina) ? $maks_brzina : '' }}"><span class="err" id="err_polje">* {{ $poljeErr }}</span></p>
        
        <p>Dužina: <input type="text" name="duzina"></p>
        <p>Širina: <input type="text" name="sirina"></p>
        <p>Visina: <input type="text" name="visina"></p>
        <p>Težina praznog vozila: <input type="text" name="teznina_praznog"></p>
        <p>Maksimalno opterecenje: <input type="text" name="maks_opter"></p>
        
        <p>Slika (.png): <input type="file" name="slika"></p>
        <p><input type="submit" class="submit" name="submit" value="Dodaj"></p>
    </form>
@endsection

