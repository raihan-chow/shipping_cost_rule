<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShippingRuleController;
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
    return redirect()->route('login');
});


Route::middleware(['auth:web'])->group(function () {

    // Route::get('/home', function () {
    //     return view('welcome');
    // });

    Route::get('/home', [HomeController::class, 'welcomeIndex'])->name('home');

    Route::resource('shipping-rule', ShippingRuleController::class);

});


