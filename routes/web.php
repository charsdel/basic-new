<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;



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

Route::get('/', [PageController::class, 'posts']);


// muestre el slug en la URL, a partir de Laravel 7 'blog/{post:slug}'
Route::get('blog/{post:slug}', [PageController::class, 'post'])->name('post');



//aqui se crean automaticamente los routes del auth de login

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//BACK END
//RUTAS DE ARTICULOS 


//uso el back slash para sar acceso a toda entidad y no la ruta como tal
//middleware para proteger
//except para evitar el show que ya lo uso en la parte publica

use App\Http\Controllers\Backend\PostController;
Route::resource('/posts', PostController::class)
    ->middleware('auth')
    ->except('show');

