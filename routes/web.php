<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderMenuControlller;
use App\Http\Controllers\TransactionControlller;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');

Route::get('/', [MainController::class, 'index'])->name('main')->middleware('guest');
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
Route::get('/updateorder', [OrderMenuControlller::class, 'show'])->name('updateOrder');
