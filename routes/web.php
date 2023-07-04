<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\LandingPagesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Landing Pages
Route::get('/', [LandingPagesController::class,'index'])->name('home');
// Route::get('/studio/show/{id}', [HomeController::class,'show']);
Route::get('/page-studio', [LandingPagesController::class,'studio'])->name('studio');
Route::get('/page-contact', [LandingPagesController::class,'contact'])->name('contact');
Route::get('/page-buy-ticket', [LandingPagesController::class,'buy_ticket'])->name('ticket');

Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/login', [AuthController::class, 'authenticate']);
  Route::get('/signup', [AuthController::class, 'signUp']);
  Route::post('/signup', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
  Route::get('/signout', [AuthController::class, 'signOut']);
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('spk');

// CRUD Studio
Route::controller(StudioController::class)->group(function() {
    Route::get('studio/', 'index');
    Route::get('studio/add', 'add');
    Route::post('studio/store', 'store');
    Route::get('studio/edit/{id}', 'edit');
    Route::post('studio/update/{id}', 'update');
    Route::get('studio/delete/{id}', 'delete');
});

Route::controller(KriteriaController::class)->group(function() {
    Route::get('kriteria/', 'index');
    Route::get('kriteria/add', 'add');
    Route::post('kriteria/store', 'store');
    Route::get('kriteria/edit/{id}', 'edit');
    Route::post('kriteria/update/{id}', 'update');
    Route::get('kriteria/delete/{id}', 'delete');
});


Route::controller(AlternatifController::class)->group(function() {
    Route::get('alternatif/', 'index');
    Route::get('alternatif/add', 'add');
    Route::post('alternatif/store', 'store');
    Route::get('alternatif/edit/{id}', 'edit');
    Route::post('alternatif/update/{id}', 'update');
    Route::get('alternatif/delete/{id}', 'delete');
});


Route::get('/hitung', [HitungController::class, 'calculateSaw'])->name('hitung');


Route::get('/testing', function () {
    return view ('auth.signin');
});
