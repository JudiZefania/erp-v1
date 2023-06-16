<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;

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

Route::get('/personnel ',[PersonnelController::class, 'index']);
 
Route::post('/save',[PersonnelController::class, 'store']);
 
Route::put('/update/{id}',[PersonnelController::class, 'update']);
 
Route::delete('/delete/{id}',[PersonnelController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
