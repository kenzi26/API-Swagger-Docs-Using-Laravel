<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecordController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route:: get('pizzas', [RecordController::class, 'index']);
Route:: post('pizzas', [RecordControlle::class, 'store']);
Route:: get('pizzas/{id}', [RecordControlle::class, 'show']);
Route:: get('pizzas/{id}/edit', [RecordControlle::class, 'edit']);
Route:: put('pizzas/{id}/edit', [RecordControlle::class, 'update']);
Route:: delete('pizzas/{id}/delete', [RecordControlle::class, 'destory']);