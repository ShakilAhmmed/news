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

Route::post('/admin','LoginController@adminLoginCheck');
Route::get('/admin','AdminController@adminLogin');
Route::get('/admin-logout','LoginController@adminLogout');
Route::resource('/xyz','LoginController');

Route::resource('/','UserController');
Route::get('/single_post/{id}','UserController@single_post');
Route::get('/details/{name}','UserController@details');
Route::get('/sub_details/{name}','UserController@sub_details');
Route::post('/comment','UserController@comment');




Route::resource('/catagory','Catagory');
Route::resource('/sub-catagory','SubCatagory');
Route::resource('/post','Post');
Route::post('/sub-catagory-data','Post@sub_catagory_data');
Route::resource('/post-details','PostDetails');
Route::resource('/advertise','Advertise');
Route::resource('/comment_details','CommentController');

//PDF
Route::get('/catagory-pdf','PdfController@catagory_pdf');








Auth::routes();

Route::get('/', 'UserController@index')->name('/');
