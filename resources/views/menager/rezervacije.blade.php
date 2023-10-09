@extends("menager.header")
<link rel="stylesheet" href="{{ asset('/css/menager/rezervacije.css') }}">
@section('sadrzaj')
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id korisnika</th>
                    <th>Id vozila</th>
                    <th>Od datuma</th>
                    <th>Do datuma</th>
                    <th>Napomena</th>
                    <th>Iznos:</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($obradjeneRezervacije) > 0)
                    @foreach($obradjeneRezervacije as $rezervacija)
                        <tr>
                            <td>{{ $rezervacija->id }}</td>
                            <td>{{ $rezervacija->id_korisnika }}</td>
                            <td>{{ $rezervacija->id_vozila }}</td>
                            <td>{{ $rezervacija->from_date }}</td>
                            <td>{{ $rezervacija->to_date }}</td>
                            <td>{{ $rezervacija->message }}</td>
                            <td>{{ $rezervacija->current_price }}</td>
                            <td>
                                <form method="POST" action="{{ route('rezervacije.obrisi', ['id' => $rezervacija->id]) }}">
                                    @csrf
                                    <button class='crveno' type='submit'>Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan='4'>Nema obradjenih rezervacija.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection