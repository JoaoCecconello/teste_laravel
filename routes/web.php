<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TarefasController;


//tarefas
Route::group(['prefix' => 'tarefas'], function(){
    Route::view('/novo', 'tarefas.novaTarefa')->middleware('auth');
    Route::get('/editar/{id}',[TarefasController::class, 'list'])->name('tarefas.editar');
    Route::get('/visualizar/{id}',[TarefasController::class, 'view'])->name('tarefas.visualizar');

    Route::post('/create',[TarefasController::class, 'create'])->name('tarefas.create')->middleware('auth');
    Route::get('/delete/{id}',[TarefasController::class, 'delete'])->name('tarefas.delete')->middleware('auth');
    Route::post('/update',[TarefasController::class, 'update'])->name('tarefas.update')->middleware('auth');
});

Route::get('/',[TarefasController::class, 'listAll'])->name('tarefas.listar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
