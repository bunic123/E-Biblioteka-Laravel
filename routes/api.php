<?php

use App\Http\Controllers\AuthKontroler;
use App\Http\Controllers\KnjigaKontroler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('vrati-sve-knjige', [KnjigaKontroler::class, 'vratiSveKnjige']);
Route::delete('obrisi-knjigu/{id}', [KnjigaKontroler::class, 'obrisiKnjigu']);
Route::get('izmena/{id}', [KnjigaKontroler::class, 'izmenaKnjige']);
Route::post('azuriraj/{id}', [KnjigaKontroler::class, 'azurirajKnjigu']);
Route::post('sacuvaj', [KnjigaKontroler::class, 'sacuvajKnjigu']);
Route::post('registracija', [AuthKontroler::class, 'registracija']);
Route::post('prijava', [AuthKontroler::class, 'prijava']);
Route::get('pretraga/{nazivKnjige}', [KnjigaKontroler::class, 'pretraga']);
Route::get('filter/{selectValue}/{filterSort}', [KnjigaKontroler::class, 'filter']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
