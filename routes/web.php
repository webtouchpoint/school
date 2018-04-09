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
		Route::get('/fees-categories/fetch-by-class-id/{school_class_id}', 'FeesCategoriesController@fetchBySchoolClassId');
		Route::resource('fees-categories', 'FeesCategoriesController');
		// Fees Structures
		Route::resource('fees-structures', 'FeesStructuresController');
		// Social Category
		Route::resource('social-categories', 'SocialCategoriesController');

	});

	Route::namespace('students')->group(function () {
		// Student
		Route::resource('students', 'StudentsController');
	});
});

Route::get('/', function () {
	return redirect('/home');
});

Auth::routes();

