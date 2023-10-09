@extends("menager.header")
<link rel="stylesheet" href="{{ asset('/css/menager/vozila.css') }}">
@section("sadrzaj")

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Model</th>
            <th>Marka</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vozila as $vozilo)
            <tr>
                <td>{{ $vozilo->id }}</td>
                <td>{{ $vozilo->naziv }}</td>
                <td>{{ $vozilo->model }}</td>
                <td>{{ $vozilo->marka }}</td>
                <td>{{ $vozilo->cena }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection