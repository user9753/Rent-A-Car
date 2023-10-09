<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RezervacijaController;
use App\Http\Controllers\AktivnostiController;
use App\Http\Controllers\AkcijeController;
use App\Http\Controllers\MailController;
use App\Models\Vozila;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CarController::class,'prikaziPocetnu'])->name('pocetna');


//Admin

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin/pocetna');
    });

    Route::get('/admin/vozila', function () {
        return view('admin/vozila');
    });

    Route::get('/korisnici', [UserController::class, 'index'])->name('korisnici.index');

    Route::get('/admin/users-export', [UserController::class, 'export'])->name('users.export');

    // Route::get('/admin/generate-pdf', [UserController::class, 'generatePDF']);

    //Izvestaji
    Route::get('/izvestaji', [UserController::class, 'prikaziStranicu'])->name('izvestaji.index');

    // xlsx
    Route::get('/izvestaji/xlsx_vozila', [UserController::class, 'generisiXLSXVozila'])->name('izvestaji.xlsx_vozila');
    Route::get('/izvestaji/xlsx_rezervacije', [UserController::class, 'generisiXLSXRezervacije'])->name('izvestaji.xlsx_rezervacije');
    
    Route::get('/admin/export-rezervacije', [UserController::class, 'exportRezervacije'])->name('rezervacije.export');
    Route::get('/admin/export-vozila', [UserController::class, 'exportVozila'])->name('vozila.export');
    

//pdf
Route::get('/izvestaji/pdf_vozila', [UserController::class, 'generateVozilaPDF'])->name('izvestaji.pdf_vozila');
Route::get('/izvestaji/pdf_rezervacije', [UserController::class, 'generateRezervacijePDF'])->name('izvestaji.pdf_rezervacije');

Route::get('/admin/generate-vozila-pdf', [UserController::class, 'generateVozilaPDF'])->name('admin.generate-vozila-pdf');
Route::get('/admin/generate-rezervacije-pdf', [UserController::class, 'generateRezervacijePDF'])->name('admin.generate-rezervacije-pdf');



    Route::get('/menageri', [UserController::class, 'showManagers'])->name('admin.menageri');

Route::post('/menageri/ukloni', [UserController::class, 'remove'])->name('remove-manager');

Route::match(['GET', 'POST'], '/menageri/dodaj', [UserController::class, 'searchUsers'])->name('search-users');

Route::post('/add-manager', [UserController::class, 'addManager'])->name('add-manager');

Route::get('/admin/vozila', [CarController::class, 'vozilaadmin'])->name('advozila.index');

// Route::post('/dodaj_vozilo', [CarController::class, 'dodajVozilo'])->name('dodaj-vozilo');

Route::get('dodaj_vozilo', [CarController::class, 'caradd'])->name('car.index');

Route::post('/car/store', [CarController::class, 'store'])->name('car.store');

Route::get('/obrisi_vozilo', [CarController::class, 'cardel'])->name('obrisipr-vozila');

Route::delete('/vozila/{id}', [CarController::class, 'destroy'])->name('obrisi-vozilo');

Route::get('/izmeni-vozilo/{id}', [CarController::class, 'izmeniVozilo'])->name('izmeni-vozilo');

Route::put('/azuriraj-vozilo/{id}', [CarController::class, 'azurirajVozilo'])->name('azuriraj-vozilo');

});

//Menager

Route::group(['middleware' => 'menager'], function () {
    Route::get('/menager', function () {
        return view('menager/pocetna');
    });


    Route::get('/menager/korisnici', [UserController::class, 'menageruser'])->name('korisnici.index');

    Route::get('/menager/vozila', [CarController::class, 'vozilaad'])->name('vozila.index');

Route::get('/neobradjene-rezervacije', [RezervacijaController::class, 'neobradjeneRezervacije'])->name('menager.neobradjene_rezervacije');
Route::get('/rezervacija/{id}/prihvati', [RezervacijaController::class, 'prihvatiRezervaciju'])->name('rezervacija.accept');
Route::get('/rezervacija/{id}/odbij', [RezervacijaController::class, 'odbijRezervaciju'])->name('rezervacija.reject');
Route::post('/manager/obradi-rezervaciju/{id}', [RezervacijaController::class, 'obradiRezervaciju'])->name('manager.obradiRezervaciju');
Route::get('/rezervacije/neobradjene', [RezervacijaController::class, 'neobradjeneRezervacije'])->name('rezervacije.neobradjene');
Route::get('/menager/rezervacije', [RezervacijaController::class, 'prikaziObradjeneRezervacije'])->name('rezervacije.obradjene');
Route::post('/rezervacije/obrisi/{id}', [RezervacijaController::class, 'obrisiRezervaciju'])->name('rezervacije.obrisi');

Route::view('/rezervacije', 'rezervacije')->name('rezervacije.index');


Route::post('/rezervacije/pretrazi', [RezervacijaController::class, 'pretraziRezervacije'])->name('rezervacije.pretrazi');
Route::post('/rezervacije/obrisi/{id}', [RezervacijaController::class, 'obrisiRezervaciju'])->name('rezervacije.obrisi');

Route::get('/aktivnosti', [UserController::class,
   'aktivnosti']);

   Route::get('/aktivnosti/pretraga', [UserController::class, 'pretragaAktivnosti'])->name('aktivnosti.pretraga');

});


// Akcije
// Route::get('/akcija/create', [AkcijeController::class, 'create'])->name('akcija.create');

//O nama
Route::get('/onama', function () {
    return view('onama');
});

//Kontakt
Route::post('/kontakt', [MailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/kontakt', function (){
    return view('kontakt', [
    ]);
});


//Rezervacija

Route::post('/rezervacija/{id}', [RezervacijaController::class, 'processForm'])->name('rezervacija.processForm');
Route::post('/rezervacija', [RezervacijaController::class, 'processForm'])->name('rezervacija.processForm');
Route::get('/rezervacija/{id}', [RezervacijaController::class, 'rezervacijaIndex'])->name('rezervacija.index')->middleware('auth');

Route::get('/vozila/{id}', 'VozilaController@show')->name('vozila.show');

Route::get('/rezervacija/success', 'RezervacijaController@success')->name('rezervacija.success');


//Vozila

Route::get('/vozila', [CarController::class, 'index'])->name('vozila');


Route::get('/vozila/{id}', [CarController::class, 'prikaziPodatke'])->name('vozila_detalji');



Route::get('/register', function () {
    return view('register', [
    ]);
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);

Auth::routes();

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



