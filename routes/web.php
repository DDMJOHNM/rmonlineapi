<?php

    use App\Http\Controllers\Client\ClientController;
    use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;

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
    return view('welcome');
});

/*
 * App Routing
 *
 */
Route::get('/token', function (Request $request) {
     ddd(csrf_token());
});

Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/loggedIn',[LoginController::class,'loggedIn']);

Route::get('/client/{id}',[ClientController::class,'getClient'])->middleware('auth');
Route::get('/clients',[ClientController::class,'getClients']);
Route::post('/add',[ClientController::class,'add'])->middleware('auth');

//edit, delete, search, validation
