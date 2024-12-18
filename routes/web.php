<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectSpaceController;

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
    // return redirect('/space');
});
Route::controller(projectSpaceController::class)->group(function () {
    Route::get('/', [projectSpaceController::class, 'index'])->name('space.index');
    Route::get('/{slug}', [projectSpaceController::class, 'show'])->name('space.show');
})->name('space');
// Route::resource('/', projectSpaceController::class)->names('space');
Route::get('/generate-ai-content', function () {
    return 'AI content generation job dispatched!';
});

