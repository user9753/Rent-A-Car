<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\RezervacijeExport;
use App\Exports\VozilaExport;
use App\Models\User;
use App\Models\Vozila;
use PDF;
use App\Models\Rezervacija;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $managerModel;

    public function __construct(User $managerModel)
    {
        $this->managerModel = $managerModel;
    }

    public function index()
    {
        // Dobijanje svih korisnika sa ulogom "null"
        $users = User::whereNull('role')->get();

        return view('admin.korisnici', compact('users'));
    }

    public function menageruser()
    {
        // Dobijanje svih korisnika sa ulogom "null"
        $users = User::whereNull('role')->get();

        return view('menager.korisnici', compact('users'));
    }

    public function showManagers()
{
    $menageri = User::where('role', 'menager')->get();

    return view('admin.menageri', compact('menageri'));
}

public function remove(Request $request)
{
    $userId = $request->input('user_id');
    $result = $this->managerModel->removeManager($userId);
    
    if ($result) {
        return redirect()->back()->with('success', 'Uspesno ste uklonili menadžera.');
    } else {
        return redirect()->back()->with('error', 'Greška prilikom uklanjanja menadžera.');
    }
}


public function searchUsers(Request $request)
{
    $userId = $request->input('user_id');
    if ($userId) {
        $users = User::where('id', $userId)
            ->whereNull('role')
            ->get();
    } else {
        $users = User::whereNull('role')->get();
    }

    return view('admin.dodaj', compact('users'));
}


public function addManager(Request $request)
{
    $userId = $request->input('user_id');
    $user = User::find($userId);

    if ($user) {
        $user->role = 'menager';
        $user->save();
        return redirect()->back()->with('success', 'Uspesno ste dodali menadžera.');
    } else {
        return redirect()->back()->with('error', 'Greška prilikom dodavanja menadžera.');
    }
}
// public function addManagerForm()
// {
//     return view('admin.dodaj');
// }

// public function addManager(Request $request)
// {
//     $userId = $request->input('user_id');
//     $result = $this->managerModel->addManager($userId);
//     if ($result) {
//         return redirect()->back()->with('success', 'Uspesno ste dodali menadžera.');
//     } else {
//         return redirect()->back()->with('error', 'Greška prilikom dodavanja menadžera.');
//     }
// }

public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    
    public function generatePDF()
    {
        $users = User::get();
  
        $data = [
            'title' => 'Welcome to LaravelTuts.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('admin.myPDF', $data);
     
        return $pdf->download('laraveltuts.pdf');
    }



    public function aktivnosti()
{
    // Dohvati aktivnosti korisnika
    $korisnikAktivnosti = User::select('id', 'created_at', 'updated_at')
        ->get()
        ->map(function ($item) {
            return [
                'id_korisnika' => $item->id,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'aktivnost' => 'Kreiranje profila',
            ];
        });

    // Dohvati aktivnosti rezervacija
    $rezervacijaAktivnosti = Rezervacija::select('id_korisnika', 'created_at', 'updated_at')
        ->get()
        ->map(function ($item) {
            return [
                'id_korisnika' => $item->id_korisnika,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'aktivnost' => 'Rezervacija',
            ];
        });

    // Kombinuj aktivnosti iz obe tabele
    $aktivnosti = $korisnikAktivnosti->concat($rezervacijaAktivnosti);

    // Sortiraj aktivnosti po 'created_at' koloni
    $aktivnosti = $aktivnosti->sortByDesc('created_at');

    return view('menager.aktivnosti', ['aktivnosti' => $aktivnosti]);

}

public function pretragaAktivnosti(Request $request)
{
    $korisnikId = $request->input('korisnik_id');
    
    // Dohvatite sve aktivnosti korisnika i rezervacija
    $korisnikAktivnosti = User::select('id', 'created_at', 'updated_at')
        ->get()
        ->map(function ($item) {
            return [
                'id_korisnika' => $item->id,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'aktivnost' => 'Kreiranje profila',
            ];
        });

    $rezervacijaAktivnosti = Rezervacija::select('id_korisnika', 'created_at', 'updated_at')
        ->get()
        ->map(function ($item) {
            return [
                'id_korisnika' => $item->id_korisnika,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'aktivnost' => 'Rezervacija',
            ];
        });

    // Kombinujte aktivnosti iz obe tabele
    $aktivnosti = $korisnikAktivnosti->concat($rezervacijaAktivnosti);

    // Ako je korisnik unio ID za pretragu, filtrirajte aktivnosti za tog korisnika
    if ($korisnikId) {
        $aktivnosti = $aktivnosti->where('id_korisnika', $korisnikId);
    }

    return view('menager.aktivnosti', [
        'aktivnosti' => $aktivnosti,
    ]);
}


public function prikaziStranicu()
{
    return view('admin.izvestaji');
}

public function generateVozilaPDF()
{
    $vozila = Vozila::all();

    $data = [
        'title' => 'Izveštaj o vozilima',
        'date' => date('m/d/Y'),
        'vozila' => $vozila
    ];

    $pdf = PDF::loadView('admin.adminPDFVozila', $data);


    return $pdf->download('izvestaj_vozila.pdf');
}

public function generateRezervacijePDF()
{
    $rezervacije = Rezervacija::all();

    $data = [
        'title' => 'Izveštaj o rezervacijama',
        'date' => date('m/d/Y'),
        'rezervacije' => $rezervacije
    ];

    $pdf = PDF::loadView('admin.adminPDFRezervacije', $data);

    return $pdf->download('izvestaj_rezervacije.pdf');
}

public function generisiXLSXRezervacije()
{
    return Excel::download(new RezervacijeExport, 'rezervacije.xlsx');
}

public function generisiXLSXVozila()
{
    return Excel::download(new VozilaExport, 'vozila.xlsx');
}

public function exportRezervacije()
{
    return Excel::download(new RezervacijeExport, 'rezervacije.xlsx');
}

public function exportVozila()
{
    return Excel::download(new VozilaExport, 'vozila.xlsx');
}

}



