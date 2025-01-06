<?php

use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createView', [DeliveryController::class, 'CreateView']);
Route::get('/viewAllDelivery', [DeliveryController::class, 'ViewDelivery']);

Route::get('/viewOne{$deliveryId}', [DeliveryController::class, 'ViewOneDelivery']);

Route::post('/createDelivery', [DeliveryController::class, 'CreateDelivery']);

Route::post('/updateOrder', [DeliveryController::class, 'UpdateOrder']);
