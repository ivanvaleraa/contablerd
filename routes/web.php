<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');

Route::group(['middleware' => 'auth'], function()
{
    //CXP
    Route::resource('cxp','App\Http\Controllers\Contabilidad\CxPController');

    //EMPLEADO
    Route::resource('empleado','App\Http\Controllers\RRHH\EmpleadoController');


});






