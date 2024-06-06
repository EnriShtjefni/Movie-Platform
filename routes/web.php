<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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


Route::controller(MovieController::class)->group(function () {
    Route::name('movies.')->group(function () {
        // returns the home page with all movies
        Route::get('/', 'index')->name('index');

        Route::group(['prefix' => 'movies'], function () {
            // returns the form for adding a movie
            Route::get('/create', 'create')->name('create');
            // adds a movie to the database
            Route::post('/', 'store')->name('store');
            // returns a page that shows a full movie
            Route::get('/{movie}', 'show')->name('show');
            // returns the form for editing a movie
            Route::get('/{movie}/edit', 'edit')->name('edit');
            // updates a movie
            Route::put('/{movie}', 'update')->name('update');
            // deletes a movie
            Route::delete('/{movie}', 'destroy')->name('destroy');
        });
    });
});

//// returns the home page with all movies
//Route::get('/', MovieController::class . '@index')->name('movies.index');
//// returns the form for adding a movie
//Route::get('/movies/create', MovieController::class . '@create')->name('movies.create');
//// adds a movie to the database
//Route::post('/movies', MovieController::class . '@store')->name('movies.store');
//// returns a page that shows a full movie
//Route::get('/movies/{movie}', MovieController::class . '@show')->name('movies.show');
//// returns the form for editing a movie
//Route::get('/movies/{movie}/edit', MovieController::class . '@edit')->name('movies.edit');
//// updates a movie
//Route::put('/movies/{movie}', MovieController::class . '@update')->name('movies.update');
//// deletes a movie
//Route::delete('/movies/{movie}', MovieController::class . '@destroy')->name('movies.destroy');
