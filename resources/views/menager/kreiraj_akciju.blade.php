{{-- <form action="{{ route('akcija.create') }}" method="POST">
    @csrf
    <label for="id_vozila">Vozilo:</label>
    <select name="id_vozila" id="id_vozila">
        @foreach($vozila as $vozilo)
            <option value="{{ $vozilo->id }}">{{ $vozilo->naziv }}</option>
        @endforeach
    </select>
    <label for="akcijska_cena">Akcijska Cena:</label>
    <input type="text" name="akcijska_cena">
    <label for="vreme_trajanja_akcije">Vreme Trajanja Akcije:</label>
    <input type="datetime-local" name="vreme_trajanja_akcije">
    <button type="submit">Dodaj Akciju</button>
</form> --}}
