<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::post('authenticate', [
    'uses' => 'ApiAuthController@authenticate', 'as' => 'authenticate'
]);

Route::post('auth/register', [
    'uses' => 'AccountController@register', 'as' => 'register'
]);

Route::post('auth/login', [
    'uses' => 'AccountController@login', 'as' => 'login'
]);

Route::get('get/all/accounts',[
    'uses'=> 'AccountController@getAll', 'as'=> 'get.all.accounts'
]);
