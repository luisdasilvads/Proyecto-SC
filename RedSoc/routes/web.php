<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\SeguimientosController;
use App\Http\Controllers\VinculoController;
use App\Http\Controllers\infoController;

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

/*Route::get('/', function () {
    return view('layouts.dashboard');
});*/
Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/beneficiario', function () {
    return view('Beneficiario.index');
});
Route::get('/beneficiario/create',[BeneficiarioController::class,'create']);
*/
Route::resource('beneficiario', BeneficiarioController::class)->middleware('auth');
Route::resource('vinculo', VinculoController::class)->middleware('auth');
Route::resource('seguimiento', SeguimientosController::class)->middleware('auth');
Route::get('/vinculo/{id}/delete', [VinculoController::class,'view_delete_vinculo'])->name('eliminar-vinculo');
Route::get('/beneficiario/{id}/delete', [BeneficiarioController::class,'view_delete_beneficiario'])->name('eliminar-beneficiario');
Route::get('/seguimiento/{id}/delete', [SeguimientosController::class,'view_delete_seguimiento'])->name('eliminar-seguimiento');
Route::get('/seguimiento/{id}/historico', [SeguimientosController::class,'view_historico_seguimiento'])->name('historico-seguimiento');

/*Route::get('/home', function () {
    return view('layouts.dashboard');   
});*/
Route::get('/home', function () {
    return view('home.info');   
});
Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::get('/home', [App\Http\Controllers\infoController::class, 'index'])->name('home');