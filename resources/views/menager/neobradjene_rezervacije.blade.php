@extends("menager.header")
<link rel="stylesheet" href="{{ asset('/css/menager/neobradjene_rezervacije.css') }}">
@section('sadrzaj')
    <h2>Neobrađene rezervacije</h2>

    @php
$brojRezervacija = ($neobradjeneRezervacije !== null && is_countable($neobradjeneRezervacije)) ? count($neobradjeneRezervacije) : 0;
    @endphp

    @if ($brojRezervacija > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>Korisnik</th>
                <th>Vozilo</th>
                <th>Od datuma</th>
                <th>Do datuma</th>
                <th>Poruka</th>
                <th>Cena</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($neobradjeneRezervacije as $rezervacija)
                <tr>
                    <td>{{ $rezervacija->id }}</td>
                    <td>{{ $rezervacija->id_korisnika }}</td>
                    <td>{{ $rezervacija->id_vozila }}</td>
                    <td>{{ $rezervacija->from_date }}</td>
                    <td>{{ $rezervacija->to_date }}</td>
                    <td>{{ $rezervacija->message }}</td>
                    <td>{{ $rezervacija->current_price }}</td>
                    <td>
                        <form method="post" action="{{ route('manager.obradiRezervaciju', ['id' => $rezervacija->id]) }}">
                            @csrf
                            <input type="hidden" name="action" value="accept">
                            <button type="submit" class="zelen">Prihvati</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{ route('manager.obradiRezervaciju', ['id' => $rezervacija->id]) }}">
                            @csrf
                            <input type="hidden" name="action" value="reject">
                            <button type="submit" class="crven">Odbij</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h2>Nema neobrađenih rezervacija</h2>
    @endif
@endsection