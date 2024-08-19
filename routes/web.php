<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderMenuControlller;
use App\Http\Controllers\TransactionControlller;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->name('login');

// Use a different URI for logout, like /logout
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('/menu', [MenuController::class, 'listMenu'])->name('menu');
    Route::get('/order', [OrderMenuControlller::class, 'index'])->name('order');
    Route::get('/transaction', [TransactionControlller::class, 'index'])->name('transaction');
    Route::get('/logs', [LogsController::class, 'index'])->name('logs');

    Route::get('/addfood', [MenuController::class, 'addMenuPages'])->name('foodPage');
    Route::post('/addfood', [MenuController::class, 'tambahMenu'])->name('addFood');
    Route::get('/updatefood/{id}/', [MenuController::class, 'editMenuPages'])->name('updateFood');
    Route::patch('/updatefood/{id}/', [MenuController::class, 'editMenu'])->name('updateFoodStore');
    Route::delete('/delete/{id}', [MenuController::class, 'deleteMenu'])->name('deleteFoodStore');

    Route::get('/addorder', [OrderMenuControlller::class, 'addOrderPages'])->name('orderPage');
    Route::post('/addorder', [OrderMenuControlller::class, 'pesananBaru'])->name('addOrder');
    Route::get('/updateorder/{id}/', [OrderMenuControlller::class, 'updateOrderPages'])->name('updateOrderPages');
    Route::patch('/updateorder/{id}/', [OrderMenuControlller::class, 'editOrder'])->name('updateOrderStore');
    Route::delete('/deleteorder/{id}/', [OrderMenuControlller::class, 'deleteOrder'])->name('deleteOrderStore');
});
