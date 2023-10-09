@extends('menager.header')
<link rel="stylesheet" href="{{ asset('/css/menager/aktivnosti.css') }}">
@section('sadrzaj')
    <h1>Aktivnosti</h1>

 <form method="GET" action="{{ route('aktivnosti.pretraga') }}">
    <div class="form-group">
        <label for="korisnik_id">Unesite ID korisnika:</label>
        <input type="text" name="korisnik_id" id="korisnik_id" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Pretraži</button>
</form>

@if ($aktivnosti->count() > 0)

    <table>
        <thead>
            <tr>
                <th>ID Korisnika</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Aktivnost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aktivnosti as $aktivnost)
                <tr>
                    <td>{{ $aktivnost['id_korisnika'] }}</td>
                    <td>{{ $aktivnost['created_at'] }}</td>
                    <td>{{ $aktivnost['updated_at'] }}</td>
                    <td>{{ $aktivnost['aktivnost'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nema aktivnosti za prikaz.</p>
@endif
@endsection
