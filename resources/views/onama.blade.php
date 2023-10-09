@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/onama.css') }}">
@section("sadrzaj")

<div class="onamaslike">
    <div class="container">
    <div class="slike"> 
            <div class="col">
            <img src="images/onama1.png" alt="">
            </div>
            <div class="col">
             <img src="images/onama2.png" alt="">
            </div>
            <div class="col">
             <img src="images/onama5.png" alt="">
            </div>
            {{-- <div class="col">
             <img src="images/onama3.png" alt="">
            </div> --}}
            {{-- <div class="col">
             <img src="images/onama4.png" alt="">
            </div>  --}}
        </div>
    </div>
</div>

<div class="opis_onama">
    <div class="container">
        <div class="row">    
<p>Dobrodošli u Rent-a-Car Niš, vašeg pouzdanog partnera za iznajmljivanje vozila u srcu Niša! Sa više od 10 godina uspešnog poslovanja, ponosno pružamo najkvalitetniju uslugu iznajmljivanja vozila našim klijentima.
</p>
<p>Naša misija je da vam omogućimo nezaboravan i bezbrižan doživljaj vožnje. Bez obzira da li ste u poseti prelepom Nišu ili trebate vozilo za poslovne potrebe, mi smo tu da vam pomognemo. Naš vozni park nudi širok spektar vozila, od kompaktnih automobila za gradsku vožnju do udobnih SUV-ova za avanturističke izlete.
</p>
<p>S ponosom ističemo da smo prepoznatljivi po izuzetnom kvalitetu usluge, konkurentnim cenama i pouzdanim vozilima. Naš tim stručnjaka posvećen je vašem udobnom i sigurnom putovanju, a naša agilna podrška je dostupna 24/7 kako bismo vam pružili pomoć i rešenja u svakom trenutku.
</p>
<p>Neka Rent-a-Car Nis bude vaš prvi izbor za iznajmljivanje vozila u Nišu. Očekujemo vas da zajedno stvaramo nezaboravna iskustva na putevima!
</p>
</div>
</div>
</div>


    <div class="maps">
    <div class="container">
        <div class="row">    
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d725.6678479467671!2d21.895467829252922!3d43.321137974376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb94eab93d93d8906!2zNDPCsDE5JzE2LjEiTiAyMcKwNTMnNDUuNyJF!5e0!3m2!1ssr!2srs!4v1658871230394!5m2!1ssr!2srs" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>


@endsection

