<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/admin_header.css') }}">
</head>
<body>
	<header>
		<div class="nav">
			<div class="hamburger">
				<span></span>
				<span></span>
			</div>
			<ul>
				<li><a href="{{ url('/') }}">Glavna</a></li>
				<li><a href="{{ url('/menageri') }}">Menadžeri</a></li>
				<li><a href="{{ url('/admin/vozila') }}">Vozila</a></li>
				<li><a href="{{ url('/korisnici') }}">Korisnici</a></li>
				<li><a href="{{ url('/izvestaji') }}">Izvestaji</a></li>
			</ul>
		</div>
	</header>

	<script>
		const hamburger = document.querySelector('.hamburger');
		const nav = document.querySelector('.nav');

		hamburger.addEventListener('click', () => {
			hamburger.classList.toggle('active');
			nav.classList.toggle('active');
		});
	</script>
</body>
</html>
