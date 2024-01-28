<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Rams;
use App\Http\Controllers\RamsController;
use App\Http\Resources\RamsResource;

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


Route::get('/rams/{id}', function ($id) {
    return new RamsResource(Rams::findOrFail($id));
});

Route::get('/rams', function () {
    return RamsResource::collection(Rams::all());
});

Route::put('/rams/{id}', [RamsController::class, 'update']);

Route::delete('/rams/{id}', [RamsController::class, 'destroy']);

Route::post('/rams', [RamsController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
