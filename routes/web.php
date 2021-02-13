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
    Route::get('getDonarProject/{donor}','DonorProject\DonorProjectController@getDonorProject');
    Route::get('getPngoProject/{pngo}','PngoProject\PngoProjectController@getPngoProject');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('countries','CountryState\CountryController');
    Route::resource('states','CountryState\StateController');
    Route::resource('districts','CountryState\DistrictController');
    Route::resource('blocks','CountryState\BlockController');
    Route::resource('academicyears','AcademicYear\AcademicYearController');
    Route::resource('donationdurations','DonationDuration\DonationDurationController');
    Route::resource('donationfrequencies','DonationFrequency\DonationFrequencyController');
    Route::resource('donortypes','DonorType\DonorTypeController');
    Route::resource('donationtypes','DonationType\DonationTypeController');
    Route::resource('lcticketcategories','LcTicketCategory\LcTicketCategoryController');
    Route::resource('donors','Donor\DonorController');
    Route::resource('donorprojects','DonorProject\DonorProjectController');
    Route::resource('leavereasons','LeaveReason\LeaveReasonController');
    Route::resource('facilities','Facility\FacilityController');
    Route::resource('lcs','Lc\LcController');
    Route::resource('teachers','Teacher\TeacherController');
    Route::resource('teacherscores','Teacher\TeacherScoreController');
    Route::resource('teacherattendances','Teacher\TeacherAttendanceController');
    Route::resource('students','Student\StudentController');
    Route::resource('studentattendances','Student\StudentAttendanceController');
    Route::resource('pngos','Pngo\PngoController');
    Route::resource('pngotypes','Pngo\PngoTypeController');
    Route::resource('projectmanagers','ProjectManager\ProjectManagerController');
    Route::resource('projectofficers','ProjectOfficer\ProjectOfficerController');
    Route::resource('territoryofficers','TerritoryOfficer\TerritoryOfficerController');
    Route::resource('pngoprojects','PngoProject\PngoProjectController');
    Route::resource('ticketcomments','TicketComment\TicketCommentController');
    Route::resource('lctickets','LcTicket\LcTicketController');
    Route::resource('commentcategories','CommentCategory\CommentCategoryController');
    Route::resource('pocs','Poc\PocController');
});
