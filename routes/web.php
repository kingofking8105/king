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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', 'Website\WebsiteController@index')->name('/');

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('/', function () {
        if(Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    })->name('home');
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('getState/{id}','CountryState\BlockController@getState');
    Route::get('getCity/{id}','CountryState\BlockController@getDistrict');
    Route::get('getBlock/{id}','CountryState\BlockController@getBlock');

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('countries','CountryState\CountryController');
    Route::resource('states','CountryState\StateController');
    Route::resource('districts','CountryState\DistrictController');
    Route::resource('blocks','CountryState\BlockController');
    Route::resource('academicyears','AcademicYear\AcademicYearController');

});
});
