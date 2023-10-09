@extends('admin.header') 

@section('sadrzaj')
    <h1>Izveštaji</h1>
    <h2>Vozila</h2>
    <a href="{{ route('izvestaji.pdf_vozila') }}" class="btn btn-primary">PDF</a>
    <a href="{{ route('vozila.export') }}" class="btn btn-success">XLSX</a>

    <h2>Rezervacije</h2>
    <a href="{{ route('izvestaji.pdf_rezervacije') }}" class="btn btn-primary">PDF</a>
   
 <a href="{{ route('rezervacije.export') }}" class="btn btn-success">XLSX</a>


 @endsection
