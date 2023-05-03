<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

use Inertia\Inertia;
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

Route::get('/', [InicioController::class, 'index'])->name('index');

//Route::get('login/facebook', [LoginController::class,'redirectToFacebook'])->name('login.facebook');
//Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
//Route::get('login/facebook/callback', [LoginController::class,'handleFacebookCallback']);
//Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login.attempt', [LoginController::class, 'login'])->name('login.attempt');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/userd', [UserController::class, 'getAuthenticatedUser'])->name(
    'userd'
);

Route::get('/publicaciones', [PublicacionController::class, 'index'])->name(
    'publicaciones.index'
);

Route::get('/obtenerpublicaciones', [
    PublicacionController::class,
    'obtenerpublicaciones',
])->name('obtenerpublicaciones');

Route::resource('comentarios', ComentarioController::class)->only([
    'store',
    'update',
    'destroy',
]);

Route::post('/comentarios/{comentario}/like', [
    ComentarioController::class,
    'like',
])->name('comentarios.like');

Auth::routes();
