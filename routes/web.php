<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Clients;

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

Route::get('/', "App\Http\Controllers\ClientsController@index")->name("home");




Route::get('/gestion/list_clients', 'App\Http\Controllers\ClientsController@show')->name('list_clients');
Route::get('/gestion/list_employe', 'App\Http\Controllers\ClientsController@employe')->name('list_employes');
Route::post('/gestion/list_employe', 'App\Http\Controllers\employesController@fetch')->name('list_clients.fetch');


Route::post('/list_clients/search', 'App\Http\Controllers\ClientsController@search')->name('list_clients.search');

Route::get('/dashboard', function () {
    return view('admin');
})->name('dashboard');

Route::get('/gestion/Service', function () {
    return view('service');
});


Route::post('/gestion/Service', 'App\Http\Controllers\ServicesController@search')->name('service');

Auth::routes();

Route::middleware('auth')->group(

    function(){

        Route::get('/admin', function () {
            return view('admin');
        });

        Route::post('/gestion/add_client', 'App\Http\Controllers\ClientsController@save');

        Route::get('/gestion/add_client', function () {
            return view('/add_client');
        });

        Route::get('/profile_edit', function () {
            return view('edit');
        })->name('profile.edit');


        Route::delete('/list_clients/delete', [ClientsController::class, 'delete'])->name('clients.delete');

        Route::get('/gestion/get_client/{id}', [ClientsController::class, 'edit']);

        Route::post('/gestion/update_client', 'App\Http\Controllers\ClientsController@update');

    }
























    
);
