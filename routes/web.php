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

Route::middleware(['auth', 'admin'])->group(function () {
	// Home
	Route::get('/home', 'HomeController@index')->name('home');
	// Settings
	Route::prefix('settings')->namespace('settings')->group(function () {
		// School
		Route::get('school/{id}/edit', 'SchoolController@edit')->name('school.edit');
		Route::post('school', 'SchoolController@store')->name('school.store');
		Route::patch('school/{school}', 'SchoolController@update')->name('school.update');
		// Session
		Route::get('set-session', 'SchoolSessionsController@showSetSessionForm')->name('school-sessions.show-set-session-form');
		Route::post('set-session', 'SchoolSessionsController@setSession')->name('school-sessions.set-session');
		Route::resource('school-sessions', 'SchoolSessionsController');
		// Class
		Route::resource('school-classes', 'SchoolClassesController');
		// Section
		Route::get('/sections/fetch-by-class-id/{school_class_id}', 'SectionsController@fetchBySchoolClassId');
		Route::resource('sections', 'SectionsController');
		// Subject Group
		Route::get('/subject-groups/fetch-by-class-id/{school_class_id}', 'SubjectGroupsController@fetchBySchoolClassId');
		Route::resource('subject-groups', 'SubjectGroupsController');
		// Subject
		Route::resource('subjects', 'SubjectsController');
		// Fees Category
		Route::resource('fees-categories', 'FeesCategoriesController');
		// Fees Structures
		Route::get('/fees-structures/fetch-by-academicInfo-id/{academicInfo_id}', 'FeesStructuresController@fetchByAcademicInfoId');
		Route::resource('fees-structures', 'FeesStructuresController');
		// Social Category
		Route::resource('social-categories', 'SocialCategoriesController');

	});

	Route::middleware('currentSchoolSession')->namespace('students')->group(function () {
		// Student
		Route::get('/students/fetch-by-class-id/{school_session_id}/{school_class_id}', 'StudentsController@fetchBySchoolClassId');
		Route::resource('students', 'StudentsController');
	});

	Route::prefix('accounts')->namespace('accounts')->group(function () {
		// Accounts Heads
		Route::resource('accounts-heads', 'AccountsHeadsController');
		// Fees Collection
		Route::prefix('fees-collection')->namespace('feesCollection')->group(function () {
			Route::get('payment', 'PaymentController@showFeesPaymentForm')->name('accounts.fees-collection.showFeesPaymentForm');
			Route::post('payment', 'PaymentController@payment')->name('acconts.fees-collection.payment');
		});
		// Fees Receipts
		Route::get('fees-receipts/{academic_info_id}', 'FeesReceiptsController@index')->name('fees-receipts.index');
		Route::get('fees-receipts/print/{accounts_transaction_id}/{academic_info_id}', 'FeesReceiptsController@print')
			->name('fees-receipts.print');
		Route::resource('accounts-transactions', 'AccountsTransactionsController');
	});
});

Route::get('/', function () {
	return redirect('/home');
});

Auth::routes();

