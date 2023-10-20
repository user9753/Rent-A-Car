@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/vozila.css') }}">
@section("sadrzaj")


<div class="dropdown">
  <button class="dropbtn"><i class="fa-solid">Sortiraj</i> </button>
  <div class="dropdown-content">
    <a href="{{ route('vozila', ['sort' => 'cena+ASC']) }}">Cena uzlazno <i class="fa-solid fa-arrow-up"></i></a>
    <a href="{{ route('vozila', ['sort' => 'cena+DESC']) }}">Cena silazno <i class="fa-solid fa-arrow-down"></i></a>
  </div>
</div>



  @if(isset($podaci_o_autu))
  <section class="featured">
    <div class="containers">
      <div class="row">
  @foreach ($podaci_o_autu as $auto)
  <div class="col">
  <div class="featured-item">
   <h3>{{ $auto->naziv }}</h3>
   <img src="{{ asset('images/' . $auto->slika) }}" alt="{{ $auto->naziv }}">
   <p>Cena već od <b>{{ $auto->cena }}</b> <sup>EUR</sup> / po danu </p>
   <div>
     <a href="{{ route('vozila_detalji', ['id' => $auto->id]) }}" method="GET">
      <button class="dugme" type="submit"><b>Detalji ponude</b></button></a>
   </div>
 </div>
</div>
@endforeach
</div>
</div>
</section>
@else 
<h1>Ne postoji</h1>
@endif


@endsection

