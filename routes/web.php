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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home');



Route::group(['middleware' => ['Admin','auth']],function (){


Route::get('/admin/create', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.create');


Route::post('/User/store',[\App\Http\Controllers\UserController::class, 'create'])->name('user.create');

Route::get('/User/Agent/View',[\App\Http\Controllers\UserController::class,'index'])->name('user.agent');
Route::get('/User/Facteur/View',[\App\Http\Controllers\UserController::class,'Facteur'])->name('user.facteur');
Route::get('/User/Agent/update/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('agent.update');
Route::get('/User/facteur/update/{id}',[\App\Http\Controllers\UserController::class,'update_facteur'])->name('facteur.update');
Route::get('/User/Delete/{id}',[\App\Http\Controllers\UserController::class,'destroy'])->name('user.delete');
Route::post('/User/Update/agent/{id}',[\App\Http\Controllers\UserController::class, 'updateAgent'])->name('user.update.agent');
Route::post('/User/Update/facteur/{id}',[\App\Http\Controllers\UserController::class, 'updateFacteur'])->name('user.update.facteur');
Route::get('/admin/AllCourrier',[\App\Http\Controllers\CourrierController::class,'showAdmin'])->name('show.admin.courrier');
Route::get('/admin/courrier/edit/{id}',[\App\Http\Controllers\CourrierController::class,'editAdmin'])->name('edit.admin.courrier');
Route::post('/admin/Courrier/store/{id}',[\App\Http\Controllers\CourrierController::class,'updatecourrierAdmin'])->name('admin.courrier.update.store');
Route::get('/admin/Courrier/delete/{id}',[\App\Http\Controllers\CourrierController::class,'destroyadmin'])->name('admin.courrier.delete');

});


Route::group(['middleware' => ['Agent','auth']],function (){
Route::get('/dashbord',[\App\Http\Controllers\CourrierController::class,'index'])->name('dashbord');
Route::post('/Courrier/create',[\App\Http\Controllers\CourrierController::class,'store'])->name('courrier.create');
Route::get('/AllCourrier',[\App\Http\Controllers\CourrierController::class,'show'])->name('show.courrier');
Route::get('/Courrier/delete/{id}',[\App\Http\Controllers\CourrierController::class,'destroy'])->name('courrier.delete');
Route::get('/Courrier/update/{id}',[\App\Http\Controllers\CourrierController::class,'edit'])->name('courrier.update');
Route::post('/Courrier/store/{id}',[\App\Http\Controllers\CourrierController::class,'updatecourrier'])->name('courrier.update.store');
Route::get('/Courrier/Details/{id}',[\App\Http\Controllers\CourrierController::class,'showDetails'])->name('show.details');
Route::get('/Courrier/traiter',[\App\Http\Controllers\TraitementCourrier::class,'index'])->name('courier.traiter');
Route::get('/Courrier/traiter/sortant/{id}',[\App\Http\Controllers\TraitementCourrier::class,'edit'])->name('courier.traiter.sortant');
Route::get('/Courrier/traiter/entrant',[\App\Http\Controllers\TraitementCourrier::class,'indexentrant'])->name('courier.traiter.entrant');
Route::post('/Courrier/traiter/entrant/store/{id}',[\App\Http\Controllers\TraitementCourrier::class,'editentrant'])->name('courier.traiter.entrant.store');
Route::get('/Courrier/traiter/entrant/store/facteur/{id}',[\App\Http\Controllers\TraitementCourrier::class,'editentrantfacteur'])->name('courier.traiter.entrant.store.facteur');
});
