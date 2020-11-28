<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();


Route::get('/', function () {
    return view('welcome');
});


// All
Route::group(
	[
		'namespace' => '\App\Http\Controllers\All'
	],
	function ()
	{
		Route::resource('/', 'IndexController')->names('all.main');
		Route::get('/article/{id}', 'IndexController@articleShow')->name('all.articleShow');
		Route::get('/user/{name}', 'IndexController@userShow')->name('all.userShow');
	}
);

// User
Route::group(
	[
		'namespace' => '\App\Http\Controllers\User'
	],
	function ()
	{
		Route::resource('/my', 'MyController')->names('user.my');
		Route::resource('/article', 'ArticlesController')->names('user.article');
	}
);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
