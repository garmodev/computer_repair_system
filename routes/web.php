<?php

use App\Http\Controllers\RouteController;
//admin
use App\Http\Controllers\AddRoomController;
use App\Http\Controllers\NotifyRepairController;
use App\Http\Controllers\NotifyRepairConfirmController;
use App\Http\Controllers\ExportPDFController;

use App\Http\Controllers\NotifyRepairHistoryController;

use App\Http\Controllers\NotifyRepairComputerController;
use App\Http\Controllers\NnotifyController;


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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //เปลี่ยนหน้า
    Route::get('/index', [RouteController::class, 'index'])->name('index');

    //user ภายนอกส่ง data

    //admin
    Route::resource('AddRoom', AddRoomController::class);
    Route::resource('NotifyRepair', NotifyRepairController::class);
    Route::resource('NotifyRepairConfirm', NotifyRepairConfirmController::class);
    Route::resource('NotifyRepairHistory', NotifyRepairHistoryController::class);
    Route::resource('ExportPDFController', ExportPDFController::class);








});
   //user
   Route::resource('NotifyRepairComputer', NotifyRepairComputerController::class);
   Route::resource('NnotifyController', NnotifyController::class);
