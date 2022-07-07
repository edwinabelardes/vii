<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\denuncia_Controller;

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

Route::get('/denun',[denuncia_Controller::class,'index']);
Route::get('/denuncia_show/{id}',[denuncia_Controller::class,'show']);
Route::post('/denuncia',[denuncia_Controller::class,'store']);
Route::put('/denuncia/{id}',[denuncia_Controller::class,'update']);
Route::delete('denuncia/{id}',[denuncia_Controller::class,'destroy']);
Route::get('conte',[denuncia_Controller::class,'conteo']);
Route::get('conte2',[denuncia_Controller::class,'conteo2']);
Route::get('conteo3',[denuncia_Controller::class,'contec']);
Route::get('conteo4',[denuncia_Controller::class,'contep']);

?>
