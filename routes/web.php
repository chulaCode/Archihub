<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/view','HomeController@show')->name('profile.show');
  
//registration
Route::prefix('register')->group(function(){
    Route::get('/agency', 'RegistrationController@agency')->name('agency');
    Route::get('/client', 'RegistrationController@client')->name('client');
    Route::post('/agency', 'RegistrationController@post')->name('post.agency');
    Route::post('/agency_names', 'RegistrationController@agency_names')->name('post.agencyNames');
    Route::post('/client', 'RegistrationController@store')->name('post.client');
});
//architect
Route::prefix('architect')->group(function(){
    Route::get('/view','ArchitechController@show')->name('profile.show');
    Route::post('/images', 'ArchitechController@storeImage')->name('post.image');
    Route::post('/profileImage', 'ArchitechController@avatar')->name('post.avatar');
    Route::post('/store', 'ArchitechController@storeProfile')->name('post.profile');
    Route::post('/detail', 'ArchitechController@personalDetail')->name('post.personal');
    Route::post('/resume', 'ArchitechController@resume')->name('post.resume');
    Route::post('/certificate', 'ArchitechController@certificate')->name('post.certificate');
    Route::post('/coverletter', 'ArchitechController@coverLetter')->name('post.cover');
    Route::post('/changePassword', 'ArchitechController@changePassword')->name('post.change');
    Route::get('/profiles', 'ArchitechController@home')->name('architect.home');
    Route::get('/profile', 'ArchitechController@index')->name('architect.index');
    Route::post('name/delete','ArchitechController@destroy')->name('image.delete');
    Route::post('image/remove','ArchitechController@delete')->name('image.remove');
    Route::post('name/edit','ArchitechController@editName')->name('name.edit');
   
   });
Route::prefix('agency')->group(function(){
    Route::get('/view','AgencyController@show')->name('view.show');
    Route::get('/profile', 'AgencyController@index')->name('agency.index');
    Route::post('/images', 'AgencyController@storeImage')->name('Apost.image');
    Route::post('/profileImage', 'AgencyController@avatar')->name('Apost.avatar');
    Route::post('/store', 'AgencyController@storeProfile')->name('Apost.profile');
    Route::post('/detail', 'AgencyController@personalDetail')->name('Apost.personal');
    Route::post('/resume', 'AgencyController@resume')->name('Apost.resume');
    Route::post('/certificate', 'AgencyController@certificate')->name('Apost.certificate');
    Route::post('/coverletter', 'AgencyController@coverLetter')->name('Apost.cover');
    Route::post('/changePassword', 'AgencyController@changePassword')->name('Apost.change');
    Route::get('/profiles', 'AgencyController@home')->name('agency.home');
    Route::post('name/delete','AgencyController@destroy')->name('Aimage.delete');
    Route::post('image/remove','ArchitechController@delete')->name('Aimage.remove');
    Route::post('name/edit','AgencyController@editName')->name('Aname.edit');
    Route::post('name','AgencyController@addName')->name('Apost.name');
   
});
Route::prefix('client')->group(function(){
    Route::get('/profile', 'ClientController@index')->name('client.index');
    Route::get('/PostJob','ClientController@postJob')->name('post.job');
    
});

