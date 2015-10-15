<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route belongs to BardFrontendController
Route::get('/', 'BardFrontendController@index');
Route::get('/trainingss', 'BardFrontendController@trainings');
Route::get('/faculty', 'BardFrontendController@faculty');
Route::get('/about', 'BardFrontendController@about');
Route::get('/contact', 'BardFrontendController@contact');


//Route belongs to BardCourseController
Route::get('/clients', 'BardClientsController@index');
Route::get('/clients/create', 'BardClientsController@create');
Route::post('/clients/create', 'BardClientsController@store');
Route::get('/clients/{id}', 'BardClientsController@show');
Route::get('/clients/{id}/edit', 'BardClientsController@edit');
Route::post('/clients/{id}/edit', 'BardClientsController@update');
Route::post('/clients/{id}/delete', 'BardClientsController@destroy');

//Route belongs to Hasib
Route::resource('registration','RegistrationController');

//Route belongs to Sajib
Route::get('/create', 'HealthController@create');
Route::post('/create', 'HealthController@store');
Route::get('/healthInfos', 'HealthController@index');
Route::get('/healthInfo/{id?}', 'HealthController@show');
Route::get('/healthInfo/{id?}/edit', 'HealthController@edit');
Route::post('/healthInfo/{id?}/edit', 'HealthController@update');

//route belongs to arif
Route::get('/training_info', 'TrainingsController@training_info');
Route::post('/training_info', 'TrainingsController@store');
Route::get('/trainings', 'TrainingsController@index');
Route::get('/training/{training_slug?}', 'TrainingsController@show');
Route::get('/training/{training_slug?}/edit','TrainingsController@edit');
Route::post('/training/{training_slug?}/edit','TrainingsController@update');
Route::post('/training/{training_slug?}/delete','TrainingsController@destroy');

//route belongs to Hasan vai
Route::get('/trainee/create', 'InfosController@create');
Route::post('/trainee/create', 'InfosController@store');
Route::get('/trainee/trainees', 'InfosController@index');
Route::get('/trainee/show/{trainee_id?}', 'InfosController@show');
Route::get('/trainee/show/{trainee_id?}/edit','InfosController@edit');
Route::post('/trainee/show/{trainee_id?}/edit','InfosController@update');

Route::get('/trainer_create', 'TrainersController@create');
Route::post('/trainer_create', 'TrainersController@store');
Route::get('/trainer_show', 'TrainersController@index');
Route::get('/trainer_show/{slug?}', 'TrainersController@show');
Route::get('/trainer_show/{slug?}/edit','TrainersController@edit');
Route::post('/trainer_show/{slug?}/edit','TrainersController@update');


//Admin route belongs sojib  vai

Route::get('admin', function () {
    return view('admin.admin_template');
});