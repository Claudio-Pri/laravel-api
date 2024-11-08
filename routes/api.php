<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\API\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//assegno un prefisso a tutte le rotte api per non andare in conflitto con le rotte web
Route::name('api.')->group(function() {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // // Rotta index
    // Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    // // Rotta show
    // Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
    // OPPURE
    Route::resource('projects', ProjectController::class)->only([
        'index',
        'show'
    ]);
});

