<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectSpaceController;
use App\Http\Controllers\siteInfomationController;

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
    return redirect('/space');
});
Route::controller(projectSpaceController::class)->group(function () {
    Route::get('/', [projectSpaceController::class, 'index'])->name('space.index');
    Route::get('/blog/{slug}', [projectSpaceController::class, 'show'])->name('space.show');
})->name('space');


Route::controller(siteInfomationController::class)->group(function () {
    Route::get('info/about-us', 'about')->name('siteinfo.about');
    Route::get('info/privacy-policy', 'privacy')->name('siteinfo.privacy');
})->name('siteInfomation');
