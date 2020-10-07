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
    Route::get('/feed', 'ArchitechController@index')->name('architect.index');
    Route::get('/savejobs', 'ArchitechController@savedJobs')->name('architect.jobs');
    Route::get('/profile', 'ArchitechController@profile')->name('architect.profile');
    Route::get('/search', 'ArchitechController@search')->name('architect.search');
    Route::get('/find', 'ArchitechController@find')->name('architect.find');
    Route::get('/urban', 'ArchitechController@urban')->name('architect.urban');
    Route::get('/interior','ArchitechController@interior')->name('architect.interior');
    Route::get('/commercial', 'ArchitechController@commercial')->name('architect.commercial');
    Route::get('/insdustrial', 'ArchitechController@industrial')->name('architect.industrial');
    Route::get('/resident', 'ArchitechController@residential')->name('architect.residential');
    Route::get('/landscape', 'ArchitechController@landscape')->name('architect.landscape');
    Route::post('name/delete','ArchitechController@destroy')->name('image.delete');
    Route::post('image/remove','ArchitechController@delete')->name('image.remove');
    Route::post('name/edit','ArchitechController@editName')->name('name.edit');
    Route::get('/{id}', 'ArchitechController@detail')->name('architect.detail'); 
   
   });
Route::prefix('agency')->group(function(){
    Route::get('/view','AgencyController@show')->name('view.show');
    Route::get('/feed', 'AgencyController@index')->name('agency.index');
    Route::get('/profile', 'AgencyController@profile')->name('agency.profile');
    Route::post('/images', 'AgencyController@storeImage')->name('Apost.image');
    Route::post('/profileImage', 'AgencyController@avatar')->name('Apost.avatar');
    Route::post('/store', 'AgencyController@storeProfile')->name('Apost.profile');
    Route::post('/detail', 'AgencyController@personalDetail')->name('Apost.personal');
    Route::post('/resume', 'AgencyController@resume')->name('Apost.resume');
    Route::post('/certificate', 'AgencyController@certificate')->name('Apost.certificate');
    Route::post('/coverletter', 'AgencyController@coverLetter')->name('Apost.cover');
    Route::post('/changePassword', 'AgencyController@changePassword')->name('Apost.change');
    Route::get('/savejobs', 'AgencyController@savedJobs')->name('architect.jobs');
    Route::get('/profiles', 'AgencyController@home')->name('agency.home');
    Route::get('/find', 'AgencyController@find')->name('agency.find');
    Route::get('/urban', 'AgencyController@urban')->name('agency.urban');
    Route::get('/interior','AgencyController@interior')->name('agency.interior');
    Route::get('/commercial', 'AgencyController@commercial')->name('agency.commercial');
    Route::get('/insdustrial', 'AgencyController@industrial')->name('agency.industrial');
    Route::get('/resident', 'AgencyController@residential')->name('agency.residential');
    Route::get('/landscape', 'AgencyController@landscape')->name('agency.landscape'); 
    Route::post('name/delete','AgencyController@destroy')->name('Aimage.delete');
    Route::post('image/remove','AgencyController@delete')->name('Aimage.remove');
    Route::post('name/edit','AgencyController@editName')->name('Aname.edit');
    Route::post('name','AgencyController@addName')->name('Apost.name');
    Route::get('/{id}', 'AgencyController@detail')->name('agency.detail'); 
   
});
Route::prefix('client')->group(function(){
    Route::get('/index', 'ClientController@index')->name('client.index');
    Route::get('/PostJob','ClientController@postJob')->name('post.job');
    Route::get('/profile', 'ClientController@profile')->name('profile');
    Route::get('/search', 'ClientController@search')->name('profile.search');
    Route::get('/agency', 'ClientController@agency')->name('client.agency');
    Route::get('/architect', 'ClientController@architect')->name('client.architect');
    Route::get('/applications', 'ClientController@applications')->name('applications');
    Route::get('/find', 'ClientController@find')->name('post.find');
    Route::get('/urban', 'ClientController@urban')->name('urban');
    Route::get('/interior','ClientController@interior')->name('interior');
    Route::get('/commercial', 'ClientController@commercial')->name('commercial');
    Route::get('/insdustrial', 'ClientController@industrial')->name('industrial');
    Route::get('/resident', 'ClientController@residential')->name('residential');
    Route::get('/landscape', 'ClientController@landscape')->name('landscape');
    Route::post('/edit', 'ClientController@edit')->name('post.edit');
    Route::post('/delete', 'ClientController@delete')->name('post.delete');
    Route::get('/{id}/{name}', 'ClientController@show')->name('jobs.show'); 
});
Route::prefix('job')->group(function(){
    Route::get('/job', 'JobController@index')->name('job.index');
    Route::post('/post','JobController@store')->name('job.store');
    
});

Route::post('application/{id}', 'JobController@apply')->name('apply');
Route::post('/save/{id}', 'JobController@saveJob')->name('save');
Route::post('/unsave/{id}', 'JobController@unsaveJob')->name('unsave');

