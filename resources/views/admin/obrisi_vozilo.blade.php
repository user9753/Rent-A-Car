@extends('admin.header')
<link rel="stylesheet" href="{{ asset('/css/admin/obrisi_vozilo.css') }}">
@section('sadrzaj')

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button id="closeBtn">OK</button>
    </div>
  
    <script>
        document.getElementById('closeBtn').addEventListener('click', function() {
            var alertBox = document.querySelector('.alert');
            alertBox.style.display = 'none';
        });
    </script>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Model</th>
                <th>Marka</th>
                <th>Cena</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->naziv }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->marka }}</td>
                    <td>{{ $car->cena }}</td>
                    <td>
                        <form method="POST" action="{{ route('obrisi-vozilo', $car->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="obrisi">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
