<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
// */
 use \App\Role;
 use \App\User;

Route::get('/',  ['middleware'=>'auth',function () {
    return view('dashboard2');
}]);
Route::get('/home', function () {
    return view('index');
});
Route::get('/dashboard', ['middleware'=>'auth',function () {
    return view('dashboard2');
}]);
// Route::get('home', ['middleware'=>'auth',function(){
//     return view('home');
// }]);

// Route::get('/inicio', function () {
//     return view('index');
// });

// Route::get('/login', function () {
//     return view('login');
// });

//roles
 Route::get('/roles', function () {
// 	$admin       = new Role();
// 	$admin->name = 'admin';	
// 	$admin->save();
	
 	$admin = Role::find(1);

 	$user = User::find(1);
// 	// role attach alias
// 	//$user->attachRole($admin); // parameter can be an Role object, array, or id
// 	//no funciona este de arriba
// 	// or eloquent's original technique
 	$user->roles()->attach($admin->id); // id only
 });



// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Registration routes...
Route::when('auth/register', 'admin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//other controller methods   //this has to be before resources routes
Route::post('users/{id}/cambiarEstado', 'UserController@cambiarEstado');
	//projects
Route::post('projects/{id}/addInfo', 'ProjectController@addInfo');
Route::post('projects/{id}/deleteUser', 'ProjectController@deleteUser');
Route::get('projects/{id}/addingUser', 'ProjectController@addingUser');
Route::post('projects/{id}/addUser', 'ProjectController@addUser');
	//tasks
Route::post('tasks/{id}/addInfo', 'TaskController@addInfo');
Route::get('tasks/createSubtask/{project_id}', 'TaskController@createSubtask');
Route::post('tasks/{id}/storeSubtask', 'TaskController@createSubtask');
Route::post('tasks/{id}/deleteUser', 'TaskController@deleteUser');
Route::get('tasks/{id}/addingUser', 'TaskController@addingUser');
Route::post('tasks/{id}/addUser', 'TaskController@addUser');

// Resources
Route::resource('users', 'UserController');
Route::resource('projects','ProjectController');
Route::resource('tasks','TaskController');

////onlyViews
    //	mail
Route::get('/mail/compose', function () {
    return view('mail/compose');
});
Route::get('/mail/mailbox', function () {
    return view('mail/mailbox');
});
Route::get('/mail/read-mail', function () {
    return view('mail/read-mail');
});

    //calendar
Route::get('/fullCalendar', function () {
    return view('calendar/calendar');
});
Route::get('/calendar', function () {
    return view('calendar/index');
});

    //Human Resources
Route::get('/humanResources/curriculum', function () {
    return view('humanResources/curriculum');
});
Route::get('/humanResources/personalityTest', function () {
    return view('humanResources/personalityTest');
});

    //Finanzas
Route::get('/finanzas/estadosGenerales', function () {
    return view('finanzas/estadosGenerales');
});

    //mapas
Route::get('/maps', function () {
    return view('maps/index');
});

//test
Route::get('/test', function () {
    return view('test/datepickerTest');
});
Route::get('/test2', function () {
    return view('test/datepickerTest2');
});
Route::get('/test3', function () {
    return view('test/datepickerTest3');
});
Route::get('/test4', function () {
    return view('test/datepickerTest4');
});
Route::get('/test5', function(){
    return view('test/dateWithBlade');
});
Route::get('/test6', function(){
    return view('test/dateWithBlade2');
});