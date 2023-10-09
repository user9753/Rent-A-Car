@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/kontakt.css') }}">
@section("sadrzaj")

<form action="{{ route('sendEmail') }}" method="POST">
  @csrf
    <label for="ime">Ime:</label>
    <input type="text" id="ime" name="ime" required>
    <label for="email">Email adresa:</label>
    <input type="email" id="email" name="email" required>
    <label for="predmet">Predmet:</label>
    <input type="text" id="predmet" name="predmet" required>
    <label for="poruka">Poruka:</label>
    <textarea id="poruka" name="poruka" required></textarea>
    <input type="submit" value="Pošalji">
  </form>

  @if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif

@if(Session::has('error'))
  <div class="alert alert-danger">
      {{ Session::get('error') }}
  </div>
@endif


@endsection