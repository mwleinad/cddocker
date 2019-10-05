<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'customer'], function() {
    Route::get('', 'CustomerGetController')->name('customerGet');
    Route::post('', 'CustomerPostController')->name('customerPost');
    Route::delete('', 'CustomerDeleteController')->name('customerDelete');
    Route::patch('', 'CustomerPatchController')->name('customerPatch');
});
/* after , using authentication
Route::group('auth:api')->get('/customer', function (Request $request) {
    return $request->user();
});*/