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
Route:: post('pizzas', [RecordController::class, 'store']);
Route:: get('pizzas/{id}', [RecordController::class, 'show']);
Route:: get('pizzas/{id}/edit', [RecordController::class, 'edit']);
Route:: put('pizzas/{id}/edit', [RecordController::class, 'update']);
Route:: delete('pizzas/{id}/delete', [RecordController::class, 'destory']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router){
    Route::post('/register', [AuthController:: class, 'register']);
    Route::post('/login', [AuthController:: class, 'login']);
    Route::get('/me', [AuthController:: class, 'me']);
    Route::post('/logout', [AuthController:: class, 'logout']);
    Route::post('/refresh', [AuthController:: class, 'refresh']);

});

Route ::get('/', function() {

    return response() -> json ([
        'message' => 'Welcome To The Laravel API'

    ]);
});