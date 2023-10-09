@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/vozila.css') }}">
@section("sadrzaj")
<h1>Na akciji: </h1>
@include('vozila')
@endsection