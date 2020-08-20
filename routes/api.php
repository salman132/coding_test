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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('history',"HistoryController@history");

Route::get('history/custom_search',"HistoryController@search");

Route::get('all_group',"HistoryController@all_group");

Route::get('group_by/{id}',"HistoryController@group_by");
Route::get('group_name/{name}',"HistoryController@group_name");
Route::get('by_date',"HistoryController@by_date");
