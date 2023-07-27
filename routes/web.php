<?php

use App\Http\Controllers\MyControl;
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

Route::get('/', function () {
    Auth::check()?$titre="vous etez connecter":$titre="welcome";
    return view('welcome',["titre"=>$titre]);
});
Route::get("inscrire", [MyControl::class,"inscrire"])->name("inscrire");
Route::get("connexion", [MyControl::class,"connexion"])->name("connexion");
Route::get("admin", [MyControl::class,"admin"])->name("admin");
Route::group([
    'prefix' => 'admin',
    "middleware"=>"admin"
], function() {
    Route::get("compte",[MyControl::class,"compte"])->name("compte");
    Route::get("creation", [MyControl::class,"creation"])->name("crer");
    Route::get("article", [MyControl::class,"acceuil"])->name("acceuil");
});