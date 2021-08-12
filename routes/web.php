<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::resource('/produtos', ProdutoController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/dashboard', function () {
//     return view('dashboard', ProdutoController::class);
// })->middleware(['auth'])->name('produtos', ProdutoController::class);

// require __DIR__.'/auth.php';

// ---------------------------------------

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard', ProdutoController::class);
// })->middleware(['auth'])->name('produtos', ProdutoController::class);

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';