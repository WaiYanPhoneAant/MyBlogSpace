<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectSpaceController;
use App\Jobs\GenerateAIContent;

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

Route::resource('/space', projectSpaceController::class);

Route::get('/generate-ai-content', function () {
    // GenerateAIContent::dispatch( 'What is php?');
    // GenerateAIContent::dispatch( 'Today Tranding Weather News');
    // GenerateAIContent::dispatch( 'Today Current Crypto');
    return 'AI content generation job dispatched!';
});

