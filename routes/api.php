<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Rams;
use App\Http\Controllers\RamsController;
use App\Http\Resources\RamsResource;
use App\Models\Subcontractors;
use App\Http\Controllers\SubcontractorController;
use App\Http\Resources\SubcontractorResource;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rams API

Route::get('/rams/{id}', function ($id) {
    return new RamsResource(Rams::findOrFail($id));
});

Route::get('/rams', function () {
    return RamsResource::collection(Rams::all());
});


Route::put('/rams/{id}', [RamsController::class, 'update']);

Route::delete('/rams/{id}', [RamsController::class, 'destroy']);

Route::post('/rams', [RamsController::class, 'store']);

Route::get('/countrams', [RamsController::class, 'countrams']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Subcontractors API

Route::get('/subcon/{id}', function ($id) {
    return new SubcontractorResource(Subcontractors::findOrFail($id));
});

Route::get('/subcon', function () {
    return SubcontractorResource::collection(Subcontractors::all());
});

Route::put('/subcon/{id}', [SubcontractorController::class, 'update']);

Route::delete('/subcon/{id}', [SubcontractorController::class, 'destroy']);

Route::post('/subcon', [SubcontractorController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth API

Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);