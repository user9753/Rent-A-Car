@if(session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
      <button id="closeBtn">OK</button>
  </div>

  <script>
      document.getElementById('closeBtn').addEventListener('click', function() {
          var alertBox = document.querySelector('.alert');
          alertBox.style.display = 'none';
      });
  </script>
  @endif


@extends('admin.header')
<link rel="stylesheet" href="{{ asset('/css/admin/vozila.css') }}">
@section('sadrzaj')
    
<a href="{{ url('/dodaj_vozilo') }}" class="dodaj">Dodaj vozilo</a>
<a href="{{ url('/obrisi_vozilo') }}" class="obrisi">Obrisi vozilo</a>
{{-- <a href="{{ route('obrisipr-vozila') }}">Prikaži vozila</a> --}}

<table border="1">
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
        @foreach ($vozila as $vozilo)
            <tr>
                <td>{{ $vozilo->id }}</td>
                <td>{{ $vozilo->naziv }}</td>
                <td>{{ $vozilo->model }}</td>
                <td>{{ $vozilo->marka }}</td>
                <td>{{ $vozilo->cena }}</td>
                <td>
                  <form method="GET" action="{{ route('izmeni-vozilo', $vozilo->id) }}">
                    @csrf
                        <input type="hidden" name="id" value="{{ $vozilo->id }}">
                        <button type="submit" class="izmeni">Izmeni</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

<style>
    
    
    </style>
    
    
    
