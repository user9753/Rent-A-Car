<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Rezervacija;
use App\Models\Vozila;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RezervacijaController extends Controller
{
    public function rezervacijaIndex($id)
    {     
       
        $vehicle = Vozila::getPodaciOAutoru($id);
       
       
        if (!$vehicle) {
            return redirect()->route('rezervacija.processForm')->with('error', 'Vozilo nije pronađeno.');
        }
    
        if (auth()->check()) {
            return view('rezervacija');
        } else {
            return redirect()->route('login')->with('error', 'Morate biti prijavljeni da biste rezervisali vozilo.');
        }

        return view('rezervacija', ['vehicle' => $vehicle]);

    }
        
    public function success()
    {
        return view('rezervacija.success'); 
    }

    public function processForm(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Morate biti prijavljeni da biste rezervisali vozilo.');
        }

        if (empty($from_date) || empty($to_date)) {
            return redirect()->back()->with('error', 'Molimo Vas izaberite datum.');
        }
        
        $idVozila = $request->input('id_vozila');
        $car = Vozila::find($idVozila);
        
        if ($car) {
            $carPrice = $car->cena;
        } else {
            $carPrice = 0;
        }
        
        $fromDate = Carbon::parse($from_date);
        $toDate = Carbon::parse($to_date);
        $diffDays = $toDate->diffInDays($fromDate);
        
        $current_date = Carbon::now();
        
        if ($fromDate < $current_date || $toDate < $current_date) {
            return redirect()->back()->with('error', 'Unesite ispravan datum.');
        }
        
        $rezervacija = Rezervacija::where('id_vozila', $idVozila)
            ->whereDate('from_date', '<=', $from_date)
            ->whereDate('to_date', '>=', $to_date)
            ->first();
        
        if ($rezervacija) {
            return redirect()->back()->with('error', 'Vozilo je već rezervisano u tom vremenskom periodu. Molimo izaberite drugi termin.');
        }
        
        $rezervacija = new Rezervacija;
        $rezervacija->id_korisnika = auth()->id();
        $rezervacija->id_vozila = $idVozila;
        $rezervacija->from_date = $from_date;
        $rezervacija->to_date = $to_date;
        $rezervacija->message = $request->input('message');
        $rezervacija->current_price = $diffDays * $carPrice; 
        $rezervacija->save();
        
        $vehicle = Vozila::find($idVozila);
        
        return redirect()->back()->with('success', 'Uspešno ste kreirali rezervaciju, naš operater će vas uskoro kontaktirati kako biste potvrdili rezervaciju.');
    }


public function neobradjeneRezervacije()
{
    $neobradjeneRezervacije = Rezervacija::whereNull('accepted')->get();
    return view('menager.neobradjene_rezervacije', ['neobradjeneRezervacije' => $neobradjeneRezervacije]);
}

public function obradiRezervaciju(Request $request, $id)
{
    
    $rezervacija = Rezervacija::find($id);

    if (!$rezervacija) {
        return redirect()->route('rezervacije.neobradjene')->with('error', 'Rezervacija nije pronađena.');
    }

    $action = $request->input('action');

    if ($action === 'accept') {
        $rezervacija->accepted = true;
        $rezervacija->save();

        return redirect()->route('rezervacije.neobradjene')->with('success', 'Rezervacija je uspešno prihvaćena.');
    } elseif ($action === 'reject') {
    
        $rezervacija->delete();

        return redirect()->route('rezervacije.neobradjene')->with('success', 'Rezervacija je uspešno odbijena.');
    }

    return redirect()->route('rezervacije.neobradjene')->with('error', 'Nevažeća akcija za obradu rezervacije.');
}


public function prihvatiRezervaciju($id)
{
    
    $rezervacija = Rezervacija::find($id);

    if (!$rezervacija) {
        return redirect()->route('rezervacije.neobradjene')->with('error', 'Rezervacija nije pronađena.');
    }

   
    $rezervacija->accepted = true;
    $rezervacija->save();

    return redirect()->route('rezervacije.neobradjene')->with('success', 'Rezervacija je uspešno prihvaćena.');
}

public function prikaziObradjeneRezervacije()
    {
        $obradjeneRezervacije = Rezervacija::where('accepted', 1)->get();

        return view('menager.rezervacije', ['obradjeneRezervacije' => $obradjeneRezervacije]);
    }


public function odbijRezervaciju($id)
{
    
    $rezervacija = Rezervacija::find($id);

    if (!$rezervacija) {
        return redirect()->route('rezervacije.neobradjene')->with('error', 'Rezervacija nije pronađena.');
    }

   
    $rezervacija->delete();

    return redirect()->route('rezervacije.neobradjene')->with('success', 'Rezervacija je uspešno odbijena.');
}

public function obrisiRezervaciju($id)
{
    $rezervacija = Rezervacija::find($id);
    if ($rezervacija) {
        $rezervacija->delete();
    }
    return redirect()->route('rezervacije.obradjene');
}
}
