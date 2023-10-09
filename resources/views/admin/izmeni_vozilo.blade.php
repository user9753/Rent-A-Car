@extends("admin.header")
<link rel="stylesheet" href="{{ asset('/css/admin/izmeni_vozilo.css') }}">
@section("sadrzaj")
    <h3>Izmena podataka vozila</h3>
    <form action="{{ route('azuriraj-vozilo', $vehicle->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>Naziv: <input type="text" name="naziv" value="{{ $vehicle->naziv }}"></p>
        <p>Model: <input type="text" name="model" value="{{ $vehicle->model }}"></p>
        <p>Marka: <input type="text" name="marka" value="{{ $vehicle->marka }}"></p>
        <p>Cena: <input type="text" name="cena" value="{{ $vehicle->cena }}"></p>
        <p>Karoserija: <input type="text" name="karoserija" value="{{ $vehicleDetail->karoserija }}"></p>
        <p>Broj vrata:
            <input type="radio" name="broj_vrata" value="3" {{ $vehicleDetail->broj_vrata == '3' ? 'checked' : '' }}>3
            <input type="radio" name="broj_vrata" value="5" {{ $vehicleDetail->broj_vrata == '5' ? 'checked' : '' }}>5
        </p>
        <p>Broj sedišta: <input type="number" name="broj_sedista" value="{{ isset($vehicleDetail->broj_sedista) ? $vehicleDetail->broj_sedista : '' }}"></p>
        <p>Menjač:
            <input type="radio" name="menjac" value="Manuelni" {{ isset($vehicleDetail->menjac) && $vehicleDetail->menjac == 'Manuelni' ? 'checked' : '' }}>Manuelni
            <input type="radio" name="menjac" value="Automatski" {{ isset($vehicleDetail->menjac) && $vehicleDetail->menjac == 'Automatski' ? 'checked' : '' }}>Automatski
        </p>
        <p>Vrsta goriva: <input type="text" name="vrsta_goriva" value="{{ isset($vehicleDetail->vrsta_goriva) ? $vehicleDetail->vrsta_goriva : '' }}"></p>
        <p>Potrošnja: <input type="text" name="potrosnja" value="{{ isset($vehicleDetail->potrosnja) ? $vehicleDetail->potrosnja : '' }}"></p>
        <p>Klima:
            <input type="radio" name="klima" value="Manuelni" {{ isset($vehicleDetail->klima) && $vehicleDetail->klima == 'Manuelni' ? 'checked' : '' }}>Manuelni
            <input type="radio" name="klima" value="Automatski" {{ isset($vehicleDetail->klima) && $vehicleDetail->klima == 'Automatski' ? 'checked' : '' }}>Automatski
            <input type="radio" name="klima" value="ne" {{ isset($vehicleDetail->klima) && $vehicleDetail->klima == 'ne' ? 'checked' : '' }}>Ne
        </p>
        <p>Pogon:
            <input type="radio" name="pogon" value="Prednji" {{ isset($vehicleDetail->pogon) && $vehicleDetail->pogon == 'Prednji' ? 'checked' : '' }}>Prednji
            <input type="radio" name="pogon" value="zadnji" {{ isset($vehicleDetail->pogon) && $vehicleDetail->pogon == 'zadnji' ? 'checked' : '' }}>Zadnji
            <input type="radio" name="pogon" value="4x4" {{ isset($vehicleDetail->pogon) && $vehicleDetail->pogon == '4x4' ? 'checked' : '' }}>4x4
        </p>
        <p>Snaga motora: <input type="text" name="snaga_motora" value="{{ isset($vehicleDetail->snaga_motora) ? $vehicleDetail->snaga_motora : '' }}"></p>
        <p>Ubrzanje: <input type="text" name="ubrazanje" value="{{ isset($vehicleDetail->ubrazanje) ? $vehicleDetail->ubrazanje : '' }}"></p>
        <p>Maksimalna brzina: <input type="text" name="maks_brzina" value="{{ isset($vehicleDetail->maks_brzina) ? $vehicleDetail->maks_brzina : '' }}"></p>
        <p>Dužina: <input type="text" name="duzina" value="{{ isset($vehicleDetail->duzina) ? $vehicleDetail->duzina : '' }}"></p>
        <p>Širina: <input type="text" name="sirina" value="{{ isset($vehicleDetail->sirina) ? $vehicleDetail->sirina : '' }}"></p>
        <p>Visina: <input type="text" name="visina" value="{{ isset($vehicleDetail->visina) ? $vehicleDetail->visina : '' }}"></p>
        <p>Težina praznog vozila: <input type="text" name="teznina_praznog" value="{{ isset($vehicleDetail->teznina_praznog) ? $vehicleDetail->teznina_praznog : '' }}"></p>
        <p>Maksimalno opterecenje: <input type="text" name="maks_opter" value="{{ isset($vehicleDetail->maks_opter) ? $vehicleDetail->maks_opter : '' }}"></p>
        <p>Slika: <input type="file" name="slika"></p>
        <p><input type="submit" name="update" value="Izmeni"></p>
    </form>
@endsection

