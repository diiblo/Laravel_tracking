<?php

use App\Livewire\DashboardLivewire;
use App\Livewire\User\UserLivewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\Document\DocumentLivewire;
use App\Livewire\Fonction\FonctionLivewire;
use App\Livewire\User\Profil\ProfilLivewire;
use App\Livewire\Document\Track\ShowLivewire;
use App\Livewire\Document\Track\TrackLivewire;
use App\Livewire\Document\Archive\ArchiveLivewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', DashboardLivewire::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Gestion des document
    Route::get('/document', DocumentLivewire::class)->name('document');
    Route::get('/archive', ArchiveLivewire::class)->name('archive');
    Route::get('/suivi', TrackLivewire::class)->name('suivi');
    Route::get('/show', ShowLivewire::class)->name('show');

    //Gestion des fonctions
    Route::get('/fonction', FonctionLivewire::class)->name('fonction');

    //Gestion des utilisateurs
    Route::get('/personnel', UserLivewire::class)->name('personnel');
    Route::get('/profil', ProfilLivewire::class)->name('profil');
});

require __DIR__.'/auth.php';
