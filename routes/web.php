<?php

use App\Http\Controllers\ComplexQueryController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/complex-query', [ComplexQueryController::class,'index'])->name('complex-query');

Route::post('/animal-lovers-with-documents', [ComplexQueryController::class, 'animalLoversWithDocuments'])->name('animal-lovers-with-documents');

Route::post('/children-sport-lovers', [ComplexQueryController::class, 'childrenSportLovers'])->name('children-sport-lovers');

Route::post('/unique-interests-no-documents', [ComplexQueryController::class, 'uniqueInterestsNoDocuments'])->name('unique-interests-no-documents');

Route::post('/people-with-multiple-documents', [ComplexQueryController::class, 'peopleWithMultipleDocuments'])->name('people-with-multiple-documents');
