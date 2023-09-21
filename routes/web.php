<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainDataController;
use App\Http\Controllers\MappingDataController;
use App\Http\Controllers\MatchingDataController;

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

Route::get("/", function () {
    return view("index");
})->name('home');


// MainData Routes
Route::get("/mainData",[MainDataController::class,'index'])->name('mainData');
Route::post("/importMainData",[MainDataController::class,'import'])->name('importData');
Route::post("/storeMainData",[MainDataController::class,'store'])->name('storeMainData');
Route::delete("/deleteMainData",[MainDataController::class,'destroy'])->name('deleteMainData');


// MappingData Routes
Route::get('/mappingData',[MappingDataController::class,'index'])->name('mappingData');
Route::post('/importMappingData',[ MappingDataController::class,'import'])->name('importMappingData');
Route::post('/storeMappingData',[ MappingDataController::class,'store'])->name('storeMappingData');
Route::post('/mapData',[MappingDataController::class,'mapData'])->name('mapData');
Route::delete("/deleteMappingData",[MappingDataController::class,'destroy'])->name('deleteMappingData');



/* // Matching Data
Route::get('/matchData', [MatchingDataController::class, 'index'])->name('matchData');
Route::get('/readExcelData', [MatchingDataController::class, 'indexImport'])->name('readExcelData'); // Add a GET route
Route::post('/readExcelData', [MatchingDataController::class, 'readExcelData'])->name('ReadExcelSheet');
Route::post('/showData', [MatchingDataController::class, 'showData'])->name('showData');
Route::post('/storeData', [MatchingDataController::class, 'store'])->name('storeUnmatched'); */




Route::get('/matchData', [MatchingDataController::class, 'index'])->name('matchData');
Route::get('/displayResults',  [MatchingDataController::class, 'displayResults'])->name('displayResults');
Route::post('/displayResults', [MatchingDataController::class, 'displayResults']); // Add the POST method route
Route::post('/readExcelData', [MatchingDataController::class, 'readExcelData'])->name('ReadExcelSheet');
Route::post('/showData', [MatchingDataController::class, 'showData'])->name('showData');
Route::post('/storeData', [MatchingDataController::class, 'store'])->name('storeUnmatched');

