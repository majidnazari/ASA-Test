<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiceRollController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/class-filter', function () {
    return view('class-filter');
});


Route::get('/roll-dice', [DiceRollController::class, 'roll'])->name('dice.roll');
