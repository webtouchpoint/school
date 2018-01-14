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
		Route::resource('school-sessions', 'SchoolSessionsController');
		Route::get('set-session', 'SchoolSessionsController@showSetSessionForm')->name('school-sessions.show-set-session-form');
		Route::post('set-session', 'SchoolSessionsController@setSession')->name('school-sessions.set-session');
		// Class
		Route::resource('school-classes', 'SchoolClassesController');
		// Section
		Route::resource('sections', 'SectionsController');
		// Subject Group
		Route::resource('subject-groups', 'SubjectGroupsController');
		Route::get('/subject-groups/fetch-by-class-id/{school_class_id}', 'SubjectGroupsController@fetchBySchoolClassId');
		// Subject
		Route::resource('subjects', 'SubjectsController');
		// Fees Category
		Route::resource('fees-categories', 'FeesCategoriesController');
		Route::get('/fees-categories/fetch-by-class-id/{school_class_id}', 'FeesCategoriesController@fetchBySchoolClassId');
		// Fees Structures
		Route::resource('fees-structures', 'FeesStructuresController');
		// Social Category
		Route::resource('social-categories', 'SocialCategoriesController');
	});

	Route::prefix('datatable')->namespace('DataTable')->group(function () {
		// Session
		Route::get('school-sessions', 'SchoolSessionsController@index')->name('datatable.school-sessions.index');
		Route::patch('school-sessions/{school_session}', 'SchoolSessionsController@update');
		// Class
		Route::get('school-classes', 'SchoolClassesController@index')->name('datatable.school-classes.index');
		// Section
		Route::get('sections', 'SectionsController@index')->name('datatable.sections.index');
		// Subject Group
		Route::get('subject-groups', 'SubjectGroupsController@index')->name('datatable.subject-groups.index');
		// Subject
		Route::get('subjects', 'SubjectsController@index')->name('datatable.subjects.index');
		// Fees Category
		Route::get('fees-categories', 'FeesCategoriesController@index')->name('datatable.fees-categories.index');
		// Fees Structure
		Route::get('fees-structures', 'FeesStructuresController@index')->name('datatable.fees-structures.index');
		// Social Category
		Route::get('social-categories', 'SocialCategoriesController@index')->name('datatable.social-categories.index');
	});
});

Route::get('/', function () {
	return redirect('/home');
});

Auth::routes();

