<?php


Route::controller(Controller::detect());

//Route::get('/',array('uses'=>'home@index'));
Route::get('/', function()
{
return View::make('home.index')->with('error_code',0);
});
Route::get('admin', array('before' => 'auth', function() {
$users=Users::all();
$uname = Session::get('username');
$uid = Session::get('id');
return View::make('admin.index')
        ->with('username',$uname)
        ->with('u_id',$uid)
        ->with('users',$users)
        ->with('confirm',2);
  
}));

/*Route::get('types',array('uses'=>'types@index'));
Route::get('types/add',array('uses'=>'types@add'));
Route::post('types/save',array('uses'=>'types@save'));*/

Route::get('course',array('uses'=>'courses@index'));
Route::get('courses/add',array('uses'=>'courses@add'));

Route::get('types',array('uses'=>'types@index'));
Route::delete('types/delete',array('uses'=>'types@delete'));

Route::get('students',array('uses'=>'students@index'));
Route::get('students/add',array('uses'=>'students@add'));
Route::get('students/view/(:any)',array('as'=>'student','uses'=>'students@view'));

//Route::get('student/(:any)',array('as'=>'student','uses'=>'students@view'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});