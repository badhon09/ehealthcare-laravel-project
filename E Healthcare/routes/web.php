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

//Route::get('/login','LoginController@index')->name('login');

// admin route

Route::group(['prefix'=>'admin'],function(){
    Route::get('/','AdminPagescontroller@dashboard')->name('admin.dashboard');
    Route::get('/profile','AdminPagescontroller@profile')->name('admin.profile');
   

});
Route::group(['prefix'=>'admin/patients'],function(){
    Route::get('/','AdminPagescontroller@patients')->name('admin.patients');
    Route::get('/add','AdminPagescontroller@createpatients')->name('admin.createpatients');
});
Route::group(['prefix'=>'admin/doctors'],function(){
    Route::get('/','AdminPagescontroller@doctors')->name('admin.doctors');
    Route::get('/add','AdminPagescontroller@createdoctors')->name('admin.createdoctors');
});
Route::group(['prefix'=>'admin/services'],function(){
    Route::get('/','AdminPagescontroller@services')->name('admin.services');
    Route::get('/add','AdminPagescontroller@createservices')->name('admin.createservices');
});
Route::group(['prefix'=>'admin/blogs'],function(){
    Route::get('/','AdminPagescontroller@blogs')->name('admin.blogs');
    Route::get('/add','AdminPagescontroller@createblogs')->name('admin.createblogs');
});
Route::group(['prefix'=>'admin/admins'],function(){
    Route::get('/','AdminPagescontroller@admins')->name('admin.admins');
    Route::get('/add','AdminPagescontroller@createadmins')->name('admin.createadmins');
    Route::post('/add','AdminController@createadmin')->name('admin.storeadmins');
});
Route::group(['prefix'=>'admin/consultingrequests'],function(){
    Route::get('/','AdminPagescontroller@consultingrequests')->name('admin.consultingrequests');
   
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/doctor', 'HomeController@index')->name('doctorhome');
