<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Rent a car</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/js.js"></script>
    <script src="/putanja/do/bootstrap.bundle.min.js"></script>
    <link href="/css/header.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Početna</a></li>
            <li><a href="{{ url('/onama') }}">O nama</a></li>
            <li><a href="{{ url('/kontakt') }}">Kontakt</a></li>
            <li><a href="{{ url('/vozila') }}">Vozila</a></li>
          
            
            {{-- @if (Route::has('login'))
            <li class="prijava"><a href="{{ url('/login') }}"><i class="fa-regular fa-user"></i>&nbsp;Prijavi se</a>
                @endif
            {{-- @else --}}
                {{-- <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> --}}
                
           
        {{-- </li> --}} 

        
                <li class="prijava"><a href="{{ url('/login') }}"><i class="fa-regular fa-user"></i>&nbsp;Prijavi se</a></li>

            
    </ul> 
    </nav>
</header>


    @yield('sadrzaj')



<footer>
    <div class="footer-basic">
         <div class="containers">
            <div class="row">
                <div class="col-md-4 col-sm-12">  
                     <p><b>Adresa:</b><br>
                     <i class="fa-solid fa-location-dot"></i> ul. Niška br.55
			            <br>
			        18000 Niš
		
                        </p>
                     <br>
   
                 </div>


    <div class="col-md-4 col-sm-12"> 
        <p><b>Dodajte nas na društvenim mrežama!</b></p>
            <div class="social">
                <a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a>
                <a href="https://www.snapchat.com/"><i class="icon ion-social-snapchat"></i></a>
                <a href="https://twitter.com/"><i class="icon ion-social-twitter"></i></a>
                <a href="https://www.facebook.com/"><i class="icon ion-social-facebook"></i></a>
            </div>
     </div>
           
    <div class="col-md-4 col-sm-12"> 
    <p class="mail"><b>Kontakt:</b><br>
    <i class="fa-solid fa-envelope"></i>
		<a href="mailto:rentacar@gmail.com">
			rentacar@gmail.com</a><br><i class="fa-solid fa-phone"></i> 060/12-34-567<br><i class="fa-solid fa-phone"></i> 018/567-890</p> 
    </div>
    </div>
    </div>

    <div class="containers">
            <div class="row">
            <div class="col-md-12">
            <p class="copyright">Rent a car © 2023</p>
</div>
</div>
    </footer>
    
<!-- bootstrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/c2a03e912f.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/js.js"></script>
</body>
</html>

