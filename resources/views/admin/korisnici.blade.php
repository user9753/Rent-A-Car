@extends("admin.header")
<link rel="stylesheet" href="{{ asset('/css/admin/korisnici.css') }}">
@section("sadrzaj")
<table border="1">
    <thead>
        <tr>
            <th>Ime</th>
            <th>ID</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    @endsection