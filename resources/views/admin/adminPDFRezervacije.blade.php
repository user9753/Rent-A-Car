<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    @if(isset($rezervacije))
        <h2>Rezervacije</h2>
        <table>
            <thead>
                <tr>
                    <th>ID korisnika</th>
                    <th>ID vozila</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Trenutna cena</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rezervacije as $rezervacija)
                    <tr>
                        <td>{{ $rezervacija->id_korisnika }}</td>
                        <td>{{ $rezervacija->id_vozila }}</td>
                        <td>{{ $rezervacija->from_date }}</td>
                        <td>{{ $rezervacija->to_date }}</td>
                        <td>{{ $rezervacija->current_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
