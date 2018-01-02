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
		// Sessions
		Route::resource('school-sessions', 'SchoolSessionsController');
		Route::get('set-session', 'SchoolSessionsController@showSetSessionForm')->name('school-sessions.show-set-session-form');
		Route::post('set-session', 'SchoolSessionsController@setSession')->name('school-sessions.set-session');
		// Classes
		Route::resource('school-classes', 'SchoolClassesController');
		// Section
		Route::resource('sections', 'SectionsController');
		// Subjec Group
		Route::resource('subject-groups', 'SubjectGroupsController');
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
	});
});

Route::get('/', function () {
	return redirect('/home');
});

Auth::routes();

