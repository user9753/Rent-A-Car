<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    @if(isset($vozila))
        <h2>Vozila</h2>
        <table>
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
                @foreach($vozila as $vozilo)
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
    @endif
</body>
</html>
