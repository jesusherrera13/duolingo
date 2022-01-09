<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\LanguageController;

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





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    // Route::resource('units', UnitController::class);
    // Route::resource('skills', SkillController::class);
    // Route::resource('practices', PracticeController::class);
    Route::get('vocabulary/create', [VocabularyController::class, 'create']);
    Route::post('vocabulary', [VocabularyController::class, 'store']);
    Route::put('vocabulary/{vocabulary}', [VocabularyController::class, 'update']);
    Route::get('vocabulary/{vocabulary}/edit/', [VocabularyController::class, 'edit']);

    Route::get('/unit/create', [UnitController::class, 'create']);
    Route::post('/unit', [UnitController::class, 'store']);
    Route::get('/unit/{unit}', [UnitController::class, 'show']);
    Route::get('/unit/{unit}/edit', [UnitController::class, 'edit']);
    Route::put('/unit/{unit}', [UnitController::class, 'update']);
    
    Route::get('unit/{unit}/skill/create', [SkillController::class, 'create']);
    Route::get('skill/{skill}/practices/create', [PracticeController::class, 'create']);
    Route::post('/skill', [SkillController::class, 'store']);
    Route::get('/skill/{skill}', [SkillController::class, 'show']);
    Route::get('/skill/{skill}/edit', [SkillController::class, 'edit']);
    Route::put('/skill/{skill}', [SkillController::class, 'update']);

    Route::post('/practice', [PracticeController::class, 'store']);
    Route::get('/practice/{practice}', [PracticeController::class, 'show']);
    Route::get('/practice/{practice}/edit', [PracticeController::class, 'edit']);
    Route::put('/practice/{practice}', [PracticeController::class, 'update']);
});

Route::group(['middleware' => ['language']], function() {
    // dd($request);
    Route::get('/', [UnitController::class, 'home']);

    Route::get('/vocabulary', [VocabularyController::class, 'index']);
    Route::get('/units/{unit}', [UnitController::class, 'show']);

    Route::get('/units', [UnitController::class, 'index']);
    Route::get('/unit/{id}', [UnitController::class, 'show']);

    Route::get('/skill/{skill}', [SkillController::class, 'show']);

    Route::get('/practices/{practice}', [PracticeController::class, 'show']);
});

Route::get('/language-selection/{language}', [LanguageController::class, 'languageSelection']);

require __DIR__.'/auth.php';
