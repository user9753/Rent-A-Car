{{-- <form method="POST" action="{{ route('add-manager') }}">
    @csrf
    <label for="user_id">ID korisnika:</label>
    <input type="text" id="user_id" name="user_id">
    <input type="submit" name="dodaj_managera" value="Dodaj menadžera">
</form> --}}

@extends('admin.header')
<link rel="stylesheet" href="{{ asset('/css/admin/dodaj.css') }}">
@section('sadrzaj')
    <h1>Dodavanje menadžera</h1>

    <form method="POST" action="{{ route('search-users') }}">
        @csrf
        <label for="user_id">Unesite ID korisnika:</label>
        <input type="text" id="user_id" name="user_id">
        <input type="submit" name="dodaj_managera" value="Pretrazi">
    </form>
    
    @if ($users->count() > 0)
    <table border="1">
        <thead>
            <tr>
                <th>Ime</th>
                <th>ID</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
           <td>
                        <form method="POST" action="{{ route('add-manager') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                            <input type="submit" name="dodaj_managera" value="Dodaj"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @else
        <p>Nema korisnika.</p>
    @endif
@endsection

