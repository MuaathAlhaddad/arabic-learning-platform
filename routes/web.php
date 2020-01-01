<?php

Auth::routes();

// pages
	Route::post('messages', 'ChatsController@sendMessage');
	Route::view('/','pages.home');
	Route::prefix('pages')->group( function() {
		Route::view('home','pages.home');
		Route::view('about', 'pages.about');
		Route::view('contact', 'pages.contact');
	});

//Chats
	Route::get('chats/room/{tutor_id}/{studnet_id}' , 'ChatsController@room')->name('chat_room');
	Route::post('close_session', 'ChatsController@close_room')->name('close_session');
	Route::get('exit_room', 'ChatsController@exit_room')->name('exit_room');


	
		// guest:student
		Route::middleware('guest:student')->group(function () {
			Route::get('students/register', 'Student\RegisterController@showRegistrationForm')->name('students.register');
			Route::post('students/register', 'Student\RegisterController@register')->name('students.register.submit');
			Route::get('students/login', 'Student\LoginController@showLoginForm')->name('students.login');
			Route::post('students/login', 'Student\LoginController@login')->name('students.login.submit');

});

// auth:student
Route::middleware('auth:student')->group(function () {
	Route::get('students/show', 'Student\StudentController@show')->name('students.show');
	Route::get('students/edit', 'Student\StudentController@edit')->name('students.edit');
	Route::patch('students/update', 'Student\StudentController@update')->name('students.update');
	Route::post('students/update_photo', 'Student\StudentController@update_photo')->name('students.update_photo');
	Route::post('packages/payment', 'StudentTutorController@payment')->name('packages.payment');
	Route::get('packages/show', 'StudentTutorController@show_packages')->name('packages.show');
	Route::post('student_tutor/create', 'StudentTutorController@create')->name('student_tutor.create');
	Route::post('packages/payment_process','StudentTutorController@payment_process')->name('packages.payment_process');	
	Route::get('pages/materials', 'StudentTutorController@index_lessons')->name('pages.materials');
	Route::get('pages/lesson_one', 'StudentTutorController@lesson_one')->name('pages.lesson_one');
	Route::get('pages/lesson_two', 'StudentTutorController@lesson_two')->name('pages.lesson_two');
	Route::get('pages/lesson_three', 'StudentTutorController@lesson_three')->name('pages.lesson_three');
	Route::get('pages/lesson_four', 'StudentTutorController@lesson_four')->name('pages.lesson_four');
	Route::get('messages', 'ChatsController@fetchMessages');
});
Route::post('lessons', 'lessonController@store')->name('lessons.store');
Route::post('student_materials', 'StudentTutorController@upload_materials')->name('student_materials');


Route::group(['prefix' => 'tutors', 'namespace' =>'Tutor'], function () {
	// guest:tutor
	Route::middleware('guest:tutor')->group(function () {
		Route::get('/register', 'RegisterController@showRegistrationForm')->name('tutors.register');
		Route::post('/register', 'RegisterController@register')->name('tutors.register.submit');
		Route::get('/login', 'LoginController@showLoginForm')->name('tutors.login');
		Route::post('/login', 'LoginController@login')->name('tutors.login.submit');
	});
	// auth:tutor
	Route::middleware('auth:tutor')->group(function () {
		Route::get('/create', 'TutorController@create')->name('tutors.create');
		Route::post('/store', 'TutorController@store')->name('tutors.store');
		Route::get('/show', 'TutorController@show')->name('tutors.show');
		Route::get('/edit', 'TutorController@edit')->name('tutors.edit');
		Route::patch('/update', 'TutorController@update')->name('tutors.update');
		Route::patch('/accept_reject', 'TutorController@accept_reject')->name('tutors.accept_reject');
	});
});
Route::get('tutors', 'Tutor\TutorController@index')->name('tutors.index')->middleware('auth:student');
Route::post('tutors/download/{id}', 'authController@download')->name('tutors.download');



Route::prefix('admins')->group(function () {
	//guest:admin
	Route::group(['middleware' => 'guest:admin', 'namespace' => 'Admin' ], function () {
		Route::get('/login', 'LoginController@showLoginForm')->name('admins.login');
		Route::post('/login', 'LoginController@login')->name('admins.login.submit');
	});
	// auth:admin
	Route::group(['middleware' => 'guest:admin', 'namespace' => 'Admin'], function () {
		Route::get('/dashboard', 'AdminController@index')->name('admins.dashboard');
		Route::get('/students/index', 'AdminController@student_index')->name('admins.students.index');
		Route::get('/tutors/index', 'AdminController@tutor_index')->name('admins.tutors.index');
		Route::delete('/tutors/delete/{id}', 'AdminController@tutor_destroy')->name('admins.tutors.delete');
		Route::delete('/students/delete/{id}', 'AdminController@student_destroy')->name('admins.students.delete');
	});
});
