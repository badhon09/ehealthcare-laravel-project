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

Route::group(['middleware' => 'admin'], function(){
    


Route::group(['prefix'=>'admin'],function(){
    Route::get('/','AdminPagescontroller@dashboard')->name('admin.dashboard');
    Route::get('/profile','AdminPagescontroller@profile')->name('admin.profile');
    Route::post('/profile','AdminPagescontroller@profileupdate')->name('admin.profileupdate');
    Route::get('/consultingrequests','AdminPagescontroller@consultingrequests')->name('admin.consultingrequests');
    Route::get('/consultingrequests/accept/{id}','AdminPagescontroller@consultingrequestsaccept')->name('admin.consultingrequestsaccept');
    Route::get('/consultingrequests/reject/{id}','AdminPagescontroller@consultingrequestsreject')->name('admin.consultingrequestsreject');
    Route::get('/payment','AdminPagescontroller@payment')->name('admin.payment');
    Route::get('/payment/print/{id}','AdminPagescontroller@paymentprint')->name('admin.paymentprint');

});
Route::group(['prefix'=>'admin/patients'],function(){
    Route::get('/','AdminPagescontroller@patients')->name('admin.patients');
    Route::get('/add','AdminPagescontroller@createpatients')->name('admin.createpatients');
    Route::post('/add','PatientController@store')->name('admin.createpatients');
    Route::get('/delete/{id}','PatientController@destroy')->name('admin.deletepatient');
    Route::get('/edit/{id}','PatientController@edit')->name('admin.editpatient');
    Route::post('/edit/{id}','PatientController@updatepatient')->name('admin.updatepatient');
});
Route::group(['prefix'=>'admin/doctors'],function(){
    Route::get('/','AdminPagescontroller@doctors')->name('admin.doctors');
    Route::get('/add','AdminPagescontroller@createdoctors')->name('admin.createdoctors');
    Route::post('/add','DoctorController@store')->name('admin.createdoctor');
    Route::get('/delete/{id}','DoctorController@destroy')->name('admin.deletedoctor');
    Route::get('/edit/{id}','DoctorController@edit')->name('admin.editdoctor');
    Route::post('/edit/{id}','AdminPagescontroller@updatedoc')->name('admin.updatedoctor');
    Route::get('/search_doctor','AdminPagescontroller@searchdoc')->name('admin.searchdoc');
});
Route::group(['prefix'=>'admin/services'],function(){
    Route::get('/','AdminPagescontroller@services')->name('admin.services');
    Route::get('/add','AdminPagescontroller@createservices')->name('admin.createservices');
    Route::post('/add','ServiceController@store')->name('admin.createservice');
    Route::get('/delete/{id}','ServiceController@destroy')->name('admin.deleteservice');
    Route::get('/edit/{id}','ServiceController@edit')->name('admin.editservice');
    Route::post('/edit/{id}','ServiceController@update')->name('admin.updateservice');
});
Route::group(['prefix'=>'admin/blogs'],function(){
    Route::get('/','AdminPagescontroller@blogs')->name('admin.blogs');
    Route::get('/add','AdminPagescontroller@createblogs')->name('admin.createblogs');
    Route::post('/add','BlogController@store')->name('admin.createblog');
    Route::get('/delete/{id}','BlogController@destroy')->name('admin.deleteblog');
});
Route::group(['prefix'=>'admin/admins'],function(){
    Route::get('/','AdminPagescontroller@admins')->name('admin.admins');

    Route::get('/add','AdminPagescontroller@createadmins')->name('admin.createadmins');
    Route::post('/add','AdminController@createadmin')->name('admin.storeadmins');
    Route::get('/delete/{id}','AdminController@destroy')->name('admin.deleteadmin');
    Route::get('/edit/{id}','AdminController@editadmin')->name('admin.editadmin');
    Route::post('/edit/{id}','AdminPagesController@update')->name('admin.updateadmin');

});
Route::group(['prefix'=>'admin/consultingrequests'],function(){
    Route::get('/','AdminPagescontroller@consultingrequests')->name('admin.consultingrequests');
   
});

});
Route::Auth();



Route::get('/doctor', 'HomeController@index')->name('doctorhome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/sign-in/github','Auth\LoginController@github');
Route::get('/sign-in/github/redirect','Auth\LoginController@githubRedirect');

Route::get('/sign-in/facebook','Auth\LoginController@facebook');
Route::get('/sign-in/facebook/redirect','Auth\LoginController@facebookRedirect');

Route::get('/home', 'HomeController@index')->name('home');
