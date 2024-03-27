<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivresController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

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

Route::get('/' , [LivresController::class, 'tousLesLivres']);
Route::get('/inscription' , [UserController::class, 'index']);
Route::post('/inscription' , [UserController::class, 'store']);


Route::get('/email/verify', [UserController::class, 'notice'])
	->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verification'])
    ->middleware(['{verifyemail ,signed'])
    ->name('verification.verify');

Route::get('/expirelink', function() {
    return view('expirelink');
})->name('link.expire');

Route::post('newlink', [UserController::class, 'sendNewLink'])->name(('get-new-link'));

Route::get('/connexion', [UserController::class, 'connexion']);

Route::post('/connexion', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

// Cette route permet d'afficher le formulaire
route::get('ajout-livre', [LivresController::class, 'index']);

// Route pour valider le formulaire
route::post('/ajout-livre', [LivresController::class, 'store']);

// Route poru afficher les livres
Route::get('/details/{id}', [LivresController::class, 'detailsLivre'])->name('details');
