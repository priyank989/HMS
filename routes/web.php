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

Route::get('/','HomeController@index');

// Auth Routes

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ]);
  Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
  ]);

  // Password Reset Routes...
  Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);

  Route::post('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@register'
  ]);

// End Auth Routes


Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile'])->middleware('auth');
Route::get('/dash', ['as' => 'dash', 'uses' => 'HomeController@index'])->middleware('auth');
Route::get('/lang/{lan}', ['as' => 'lang', 'uses' => 'HomeController@setLocale'])->middleware('auth');

Route::get('/patient',['as' => 'patient', 'uses' => 'PatientController@index'])->middleware('auth','staff','lang');
Route::post('/channel',['as' => 'makechannel', 'uses' => 'PatientController@makeChannel'])->middleware('auth','staff','lang');
Route::get('/patientregcard/{pid}',['as' => 'pregcard', 'uses' => 'PatientController@regcard'])->middleware('auth','staff');
Route::post('/patientregister',['as' => 'patient_register', 'uses' => 'PatientController@register_patient'])->middleware('auth','staff');
Route::get('/createchannel',['as' => 'create_channel_view', 'uses' => 'PatientController@create_channel_view'])->middleware('auth','staff');
Route::get('/inpatientregister',['as' => 'register_in_patient_view', 'uses' => 'PatientController@register_in_patient_view'])->middleware('auth','staff');

Route::get('/checkpatient',['as' => 'check_patient_view', 'uses' => 'PatientController@check_patient_view'])->middleware('auth','doctor');

Route::get('/myattend', ['as' => 'myattend', 'uses' => 'AttendController@myattend'])->middleware('auth');
Route::get('/attendmore', ['as' => 'attendmore', 'uses' => 'AttendController@attendmore'])->middleware('auth','admin');
Route::get('/attendance', ['as' => 'attendance', 'uses' => 'AttendController@markattendance'])->middleware('guest');

Route::get('/regfinger', ['as' => 'regfinger', 'uses' => 'UserController@showRegFingerprint'])->middleware('auth','admin');
Route::post('regfinger',['as'=>'user.regfinger','uses'=>'UserController@regFinger'])->middleware('auth','admin');

Route::get('/newuser', ['as' => 'newuser', 'uses' => 'UserController@regNew'])->middleware('auth','admin');
Route::get('/resetuser', ['as' => 'resetuser', 'uses' => 'UserController@resetUser'])->middleware('auth','admin');

Route::post('/changepassword', ['as' => 'change_password', 'uses' => 'UserController@ChangeUserPassword'])->middleware('auth');


