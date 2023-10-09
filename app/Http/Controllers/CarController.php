<?php

namespace App\Http\Controllers;
use App\Models\Vozila;
use App\Models\VozilaDetalji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CarController extends Controller
{
//     public function index()
// {
//     $podaci_o_autu = Vozila::getAll();
   
// return view('vozila')->with('podaci_o_autu', $podaci_o_autu);
// }

public function index(Request $request)
{
    $sort = $request->query('sort');

    if ($sort === 'cena+ASC') {
        $podaci_o_autu = Vozila::orderBy('cena', 'asc')->get();
    } elseif ($sort === 'cena+DESC') {
        $podaci_o_autu = Vozila::orderBy('cena', 'desc')->get();
    } else {
        $podaci_o_autu = Vozila::getAll();
    }

    return view('vozila')->with('podaci_o_autu', $podaci_o_autu);
}


public function vozilaadmin()
{
    $vozila = Vozila::all();
   
    return view('admin/vozila', ['vozila' => $vozila]);
}

public function vozilaad()
{
    $vozila = Vozila::all();
   
    return view('menager/vozila', ['vozila' => $vozila]);
}

public function destroy($id)
{
    $car = Vozila::find($id);
    if ($car) {
        $carDetails = VozilaDetalji::where('detalji_id', $car->id)->first();
        if ($carDetails) {
            $carDetails->delete();
        }

        $car->delete();
        return redirect()->back()->with('success', 'Vozilo je uspešno obrisano.');
    } else {
        return redirect()->back()->with('error', 'Vozilo nije pronađeno.');
    }
}



public function prikaziPodatke(Request $request, $id)
{

    $podaci_o_autu = Vozila::getPodaciOAutoru($id);
    $detalji = Vozila::getDetalji($id);

    return view('vozila_detalji', [
        'podaci_o_autu' => $podaci_o_autu,
        'detalji' => $detalji,
    ]);
     
}



public function store(Request $request)
{

    $request->validate([
        'naziv' => 'required',
        'model' => 'required',
        'marka' => 'required',
        'cena' => 'required',
        'karoserija'=>'required',
    ]);

    $existingCar = Vozila::where('naziv', $request->input('naziv'))->first();
    if ($existingCar) {
        return redirect()->route('advozila.create')->with('message', 'Vozilo sa istim nazivom već postoji.');
    }

    
    $car = new Vozila();
    $car->naziv = $request->input('naziv');
    $car->model = $request->input('model');
    $car->marka = $request->input('marka');
    $car->cena = $request->input('cena');

  

    if ($request->hasFile('slika')) {
        $image = $request->file('slika');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $car->slika = $imageName;

        $car->save();
    }

     $car->save();

     $cardetails = new VozilaDetalji();
     $cardetails->detalji_id = $car->id; 
     $cardetails -> karoserija = $request->input('karoserija');
     $cardetails -> broj_sedista = $request->input('broj_sedista');
     $cardetails -> broj_vrata = $request->input('broj_vrata');
     $cardetails -> klima = $request->input('klima');
     $cardetails -> pogon = $request->input('pogon');
     $cardetails -> menjac = $request->input('menjac');
     $cardetails -> vrsta_goriva = $request->input('vrsta_goriva');
     $cardetails -> potrosnja = $request->input('potrosnja');
     $cardetails -> ubrazanje = $request->input('ubrazanje');
     $cardetails -> maks_brzina = $request->input('maks_brzina');
     $cardetails -> snaga_motora = $request->input('snaga_motora');
     $cardetails -> duzina = $request->input('duzina');
     $cardetails -> sirina = $request->input('sirina');
     $cardetails -> visina = $request->input('visina');
     $cardetails -> teznina_praznog = $request->input('teznina_praznog');
     $cardetails -> maks_opter = $request->input('maks_opter');


     $cardetails->save();

    return redirect()->route('advozila.index')->with('message', 'Vozilo je uspešno dodato.');
}


public function text_validation($naziv, $model, $marka, $cena, $broj_vrata, $menjac, $klima, $pogon, $karoserija)
    {
        $poljeErr = ""; 
        $validation = true; 
        return compact('poljeErr', 'validation');
    }

    public function caradd()
    {
        $naziv = $model = $marka = $cena = $broj_vrata = $menjac = $klima = $pogon = $karoserija = "";
        $poljeErr = ""; 
    
        $data = $this->text_validation($naziv, $model, $marka, $cena, $broj_vrata, $menjac, $klima, $pogon, $karoserija);
        $poljeErr = $data['poljeErr'];
        $validation = $data['validation'];
    
        return view('admin.dodaj_vozilo', compact('naziv', 'poljeErr', 'validation'));
    }
    
    public function cardel()
    {  
        $cars = Vozila::all();
        return view('admin.obrisi_vozilo', compact('cars'));
    }



    public function izmeniVozilo($id)
    {
        

        $vehicle = Vozila::find($id);
        $vehicleDetail = VozilaDetalji::where('detalji_id', $id)->first();
        
        return view('admin.izmeni_vozilo', compact('vehicle', 'vehicleDetail'));
    }

    public function azurirajVozilo(Request $request, $id)
    {
        $request->validate([
            'naziv' => 'required',
            'model' => 'required',
            'marka' => 'required',
            'cena' => 'required',
        'karoserija' => 'required',
        ]);

        $vehicle = Vozila::find($id);
        $vehicle->naziv = $request->input('naziv');
        $vehicle->model = $request->input('model');
        $vehicle->marka = $request->input('marka');
        $vehicle->cena = $request->input('cena');
        
        $vehicleDetail = VozilaDetalji::where('detalji_id', $id)->first();
        $vehicleDetail->karoserija = $request->input('karoserija');
        $vehicleDetail->broj_vrata = $request->input('broj_vrata');
        $vehicleDetail->broj_sedista = $request->input('broj_sedista');

        if ($request->hasFile('slika')) {
            $slika = $request->file('slika');
            $slika_putanja = "../photo/" . $slika->getClientOriginalName();
        }

        $vehicle->save();
        $vehicleDetail->save();

        return redirect()->route('advozila.index')->with('success', 'Podaci su uspešno ažurirani.');
    }

    public function prikaziPocetnu()
{
    $podaci_o_autu = Vozila::getAll();


    return view('pocetna')->with('podaci_o_autu', $podaci_o_autu);
}

}

