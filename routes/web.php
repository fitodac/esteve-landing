<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Static\HomeController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/podcasts-consultas', [MediaController::class, 'index'])->name('media');

		Route::get('/mi-cuenta', function () {
			return Inertia::render('Auth/Account');
		})->name('account');
});


Route::get('/confirmacion-registro', function () {
	return Inertia::render('RegisterConfirmation');
})->name('register-confirmation');

Route::get('/confirmacion-email', function () {
	return Inertia::render('EmailConfirmation');
})->name('email-confirmation');

Route::post('/link-email-confirmation', function () {
	return Inertia::render('EmailLinkConfirmation');
})->name('link-email-confirmation');


require __DIR__ . '/auth.php';
