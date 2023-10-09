@extends("admin.header")
<link rel="stylesheet" href="{{ asset('/css/admin/menageri.css') }}">
@section("sadrzaj")

<a href="{{url('menageri/dodaj')}}" class="dodaj">Dodaj menadžera</a>

<table>
    <thead>
        <tr>
            <th>Ime</th>
            <th>ID</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menageri as $manager)
        <tr>
            <td>{{ $manager->id }}</td>
            <td>{{ $manager->name }}</td>
            <td>{{ $manager->email }}</td>
            <td>
                <form method="POST" action="{{ route('remove-manager') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $manager->id }}"/>
                    <input type="submit" name="ukloni_managera" value="Ukloni"/>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection