<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija vozila</title>
</head>
<body>
    
    
    <form action="{{ route('rezervacija.processForm') }}" method="post">
        @csrf
        @method('POST')
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
        <h1>Rezervacija vozila</h1>
        <input type="hidden" name="id_vozila" value="{{ $vehicle->id ?? '' }}">
        <input type="hidden" name="id_korisnika" value="{{ auth()->id() ?? '' }}">

        

        <label for="from_date">Od datuma:</label>
        <input type="date" id="from_date" name="from_date" onchange="updateCurrentPrice()">

        <label for="to_date">Do datuma:</label>
        <input type="date" id="to_date" name="to_date" onchange="updateCurrentPrice()">

       
        <label for="message">Ostavite poruku:</label>
        <textarea id="message" name="message"></textarea>

        
        <label for="current_price">Cena za izabrani period:</label>
        <input type="text" id="current_price" name="current_price" readonly>
        <input type="hidden" id="car_price" name="car_price" value="{{ $vehicle->price ?? '' }}">

        <button class="rezervisi" type="submit" id="submit-btn">Rezerviši</button>
        
        <input type="hidden" name="id" value="{{ $vehicle->id ?? '' }}">
    </form>

    <script>
        function updateCurrentPrice() {
            var fromDate = new Date(document.getElementById("from_date").value);
            var toDate = new Date(document.getElementById("to_date").value);
            var oneDay = 24 * 60 * 60 * 1000; 
            var diffDays = Math.round(Math.abs((fromDate - toDate) / oneDay));

            
            var carPrice = parseFloat(document.getElementById("car_price").value);

            if (!isNaN(carPrice)) {
                var currentPrice = diffDays * carPrice;
                document.getElementById("current_price").value = currentPrice.toFixed(2); 
            } else {
                document.getElementById("current_price").value = "0.00";
            }
        }
    </script>
</body>
</html>
