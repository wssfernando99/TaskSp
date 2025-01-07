<?php

use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createView', [DeliveryController::class, 'CreateView']);
Route::get('/viewAllDelivery', [DeliveryController::class, 'ViewDelivery']);

Route::get('/viewDelivery{$id}', [DeliveryController::class, 'ViewOneDelivery']);

Route::post('/createDelivery', [DeliveryController::class, 'CreateDelivery']);

Route::post('/updateOrder', [DeliveryController::class, 'UpdateOrder']);

Route::post('/delete', [DeliveryController::class, 'Delete']);
