<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menager</title>
	<link rel="stylesheet" href="{{ asset('/css/menager/header.css') }}">
</head>
<body>
    <header class="header">
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav">
            <a href="{{ url('/') }}">Glavna</a>
            <a href="{{ url('/rezervacije/neobradjene') }}">Zahtevi</a>
            <a href="{{ url('/menager/vozila') }}">Vozila</a>
            <a href="{{ url('/menager/korisnici') }}">Korisnici</a>
            <a href="{{ url('/menager/rezervacije') }}">Rezervacije</a>
            <a href="{{ url('/aktivnosti') }}">Aktivnost</a>
        </nav>
    </header>
</body>

@yield('sadrzaj')

<script>
    const hamburger = document.querySelector('.hamburger');
    const nav = document.querySelector('.nav');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        nav.classList.toggle('active');
    });
</script>