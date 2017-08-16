<?php

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
    return view('welcome');
});
Route::get('/contact', function () {
    return view('welcome');
});
Route::get('/career', function () {
    return view('welcome');
});
Route::get('/portfolio', function () {
    return view('welcome');
});
Route::get('/about-us', function () {
    return view('welcome');
});

Route::get('/service', function () {
    return view('welcome');
});

Route::get('/software_developement', function () {
	return view('welcome');
});

Route::get('/mobile_application_service', function (){
	return view('welcome');
});

Route::get('/view-job-details/{id}', function() {
	return view('welcome');
});

Route::get('/web_service', function (){
	return view('welcome');
});

Route::get('/saas_service', function (){
	return view('welcome');
});

Route::get('/testimonial_details',function(){
	return view('welcome');
});

Route::get('/admin','LoginController@index');

Route::post('/login','LoginController@submit');

Route::group(['middleware' => ['adminlogin']], function() {
	Route::get('/dashboard', 'LoginController@dashboard');
	Route::get('/banner_form', 'BannerController@index');
	Route::post('/banner_submit', 'BannerController@banner_submit');
	Route::get('/home_page_slider', 'BannerController@home_silder_view');
	Route::get('/testimonial_form', 'BannerController@testimonial_form');
	Route::post('/testimonial_submit', 'BannerController@testimonial_submit');
	Route::get('/protfolio_form', 'BannerController@protfolio_form');
	Route::post('/portfolio_form_submit', 'BannerController@portfolio_form_submit');
	Route::get('/home_banner_edit/{banner_id}', 'BannerController@banner_edit');
	Route::post('/banner_edit_submit/{banner_id}', 'BannerController@banner_edit_submit');
	Route::get('/home_banner_delete/{banner_id}', 'BannerController@banner_edit_delete');
	Route::get('/testimonial_listings', 'BannerController@testimonial_listings');
	Route::get('/testimonial_edit/{testimonial_id}', 'BannerController@testimonial_edit');
	Route::post('/testimonial_edit_submit/{testimonial_id}', 'BannerController@testimonial_edit_submit');
	Route::get('/testimonial_delete/{testimonial_id}', 'BannerController@testimonial_delete');
	Route::get('/protfolio_type', 'BannerController@protfolio_type');
	Route::post('/portfolio_type_submit', 'BannerController@portfolio_type_submit');
	Route::get('/portfolio_listings', 'BannerController@portfolio_type_listings');
	Route::get('/portfolio_type_edit/{portfolio_type_id}', 'BannerController@portfolio_type_edit');
	Route::post('/portfolio_type_edit_submit/{portfolio_type_id}', 'BannerController@portfolio_type_edit_submit');
	Route::get('/portfolio_type_delete/{portfolio_type_id}', 'BannerController@portfolio_type_delete');
	Route::get('/website_settings_listings', 'BannerController@website_settings_listings');
	Route::get('/website_settings_edit/{website_id}', 'BannerController@website_settings_edit');
	Route::post('/website_details_submit/{id}', 'BannerController@website_details_submit');
	Route::get('/profile', 'BannerController@show_profile');
	Route::post('/profile_submit/{user_id}', 'BannerController@profile_submit');
	Route::get('/prtfolios_listings', 'BannerController@portfolios_listings');
	Route::get('/portfolios_listings_edit/{portfolio_id}', 'BannerController@portfolios_edit_page');
	Route::post('/portfolios_edit_submit/{portfolios_edit_id}', 'BannerController@portfolios_edit_page_submit');
	Route::get('/portfolios_listings_delete/{portfolio_id}', 'BannerController@portfolios_listings_delete');
	Route::get('/job_vacency_list', 'BannerController@job_vacency_listings');
	Route::get('/add_job_list', 'BannerController@add_job_list');
	Route::post('/job_vacency_add', 'BannerController@job_vacency_add');
	Route::get('/job_vacency_edit/{job_id}', 'BannerController@job_vacency_edit');
	Route::get('/job_vacency_delete/{job_id}', 'BannerController@job_vacency_delete');
	Route::post('/job_vacency_edit_submit/{job_id}', 'BannerController@job_vacency_edit_submit');
	Route::get('/service_page_list', 'BannerController@service_page_list');
	Route::get('/add_services_view', 'BannerController@add_services_view');
	Route::post('/services_add_submit', 'BannerController@services_add_submit');
	Route::get('/service_page_edit/{service_id}', 'BannerController@service_page_edit');
	Route::post('/services_page_edit_submit/{service_id}', 'BannerController@services_page_edit_submit');
	Route::get('/sign_out','LoginController@logout');

});

