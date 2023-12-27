<?php

use App\Http\Controllers\CheckPointsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RosterController;
use App\Models\CheckPointsModel;
use App\Models\RosterModel;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('auth/login');});

Route::get('/components/dashboard', function () {
    return view('/components/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/components/roster', function () {
    $data = RosterModel::latest()->get ();
    return view('components.roster', compact('data'));
})->middleware(['auth', 'verified'])->name('Roster');

Route::get('/components/check-Points', function () {
    $data = CheckPointsModel::latest()->get ();
    return view('/components/check-Points', compact('data'));
})->middleware(['auth', 'verified'])->name('Check-Points');


Route::get('/components/sign-In', function () {
    return view('/components/sign-In');
})->middleware(['auth', 'verified'])->name('sign-In');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::resource('CheckPointsResource',CheckPointsController::class);
Route::resource('RosterResource',RosterController::class);

require __DIR__.'/auth.php';
