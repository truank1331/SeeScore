<?php
    Route::view('/', 'welcome')->name('welcome');
    Auth::routes(['verify' => true]);

    Route::get('/home', 'HomeController@index')->name('student.home')->middleware('auth');

    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.home')->middleware('auth:admin');
        Route::get('/register', 'AdminController@addteacher')->name('admin.addteacher')->middleware('auth:admin');
        Route::post('/add', 'AdminController@add')->name('admin.add')->middleware('auth:admin');
        Route::post('send','sendController@send')->name('admin.send');
    });

    Route::prefix('teacher')->group(function () {
        Route::get('/', 'TeacherController@index')->name('teacher.home')->middleware('auth:teacher');
        Route::get('/student/{id}', 'TeacherController@findStudent')->name('teacher.find')->middleware('auth:teacher');
        Route::get('/addclass', 'TeacherController@showAddclassForm')->name('teacher.addclass')->middleware('auth:teacher');
        Route::get('/addtoclass', 'TeacherController@addclass')->name('teacher.addtoclass')->middleware('auth:teacher');
        Route::get('/showstudent', 'TeacherController@showstudent')->name('teacher.showstudent')->middleware('auth:teacher');
        Route::get('/editclass', 'TeacherController@editclass')->name('teacher.editclass')->middleware('auth:teacher');
        Route::get('/deleteclass','TeacherController@deleteclass')->name('teacher.deleteclass')->middleware('auth:teacher');
        Route::get('/addteacher','TeacherController@addteacher')->name('teacher.addteacher')->middleware('auth:teacher');
        Route::post('/changestatus','TeacherController@changestatus')->name('teacher.changestatus')->middleware('auth:teacher');
        Route::post('/store','TeacherController@store')->name('teacher.store')->middleware('auth:teacher');
        Route::post('/showscore','TeacherController@showScore')->name('teacher.showscore')->middleware('auth:teacher');
    });

    Route::prefix('register')->group(function () {
        Route::get('/admin', 'Auth\RegisterController@showAdminRegisterForm');
        Route::get('/teacher', 'Auth\RegisterController@showTeacherRegisterForm')->name('teacher.register');

        Route::post('/admin', 'Auth\RegisterController@createAdmin');
        Route::post('/teacher', 'Auth\RegisterController@createTeacher');
    });

    Route::prefix('login')->group(function () {
        Route::get('/admin', 'Auth\LoginController@showAdminLoginForm');
        Route::get('/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('teacher.login');

        Route::post('/admin', 'Auth\LoginController@adminLogin');
        Route::post('/teacher', 'Auth\LoginController@teacherLogin');
    });

    