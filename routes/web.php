<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PracticeController;

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

Route::get('/', [UnitController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('units', UnitController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('practices', PracticeController::class);

    Route::get('units/{unit}/skills/create',[SkillController::class, 'create']);
    Route::get('skills/{skill}/practices/create',[PracticeController::class, 'create']);
});

require __DIR__.'/auth.php';
