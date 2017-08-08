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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/contact-us-submit','PageController@contact_us_submit');
Route::get('/wrc-website-details','PageController@wrc_website_details');
Route::get('/load-home-content','PageController@load_home_content');
Route::get('/job-vacency-details', 'PageController@job_vacency_details');
Route::get('/view-job-details', 'PageController@view_individuals_job_details');
Route::post('/applied-job', 'PageController@applied_job');
