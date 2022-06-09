<?php


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PagesController;
// use App\Http\Controllers\SiswaController;

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
//     return view('index');
// });

// Route::get('/about', function () {
// 	$nama = 'Bro!';
//     return view('about', ['nama' => $nama]);
// });

	// Navbar

// Route::group(['middleware' => ['auth', 'userlevel:user']], function(){

Route::get('/user', 'UserController@home');
Route::get('/user/about', 'UserController@about');

Route::get('/user/customer', 'UserController@customer');
Route::get('/user/databook', 'UserController@databook');


Route::get('/user/databook/{databook}/beli', 'UserController@databook_beli');
Route::patch('/user/databook/{databook}', 'UserController@beli');

Route::get('/user/databook/search', 'UserController@databook_search');
Route::get('/user/customer/search', 'UserController@search');

// Route::resource('customer', 'CustomerController');
// Route::resource('databook', 'DataBookController');

// });

Route::group(['middleware' => ['auth', 'userlevel:admin']], function(){
	// Navbar
	Route::get('/', 'PagesController@home');
	Route::get('/about', 'PagesController@about');
	Route::get('/customer', 'CustomerController@index');
	Route::get('/databook', 'DataBookController@index');
	Route::get('/users', 'UsersController@index');

	// Customer Controller
	Route::post('/customer', 'CustomerController@store');
	Route::get('/customer/create', 'CustomerController@create');
	Route::delete('/customer/{customer}', 'CustomerController@destroy');
	Route::get('/customer/{customer}/edit', 'CustomerController@edit');
	Route::patch('/customer/{customer}', 'CustomerController@update');

	// DataBook Controller
	Route::post('/databook', 'DataBookController@store');
	Route::get('/databook/create', 'DataBookController@create');
	Route::delete('/databook/{databook}', 'DataBookController@destroy');
	Route::get('/databook/{databook}/edit', 'DataBookController@edit');
	Route::patch('/databook/{databook}', 'DataBookController@update');

	// Users Controller
	Route::get('/register-admin', 'UsersController@register_admin');
	Route::get('/register-user', 'UsersController@register_user');
	Route::post('/users', 'UsersController@store');
	Route::delete('/users/{user}', 'UsersController@destroy');
	Route::patch('/users/{user}', 'UsersController@update');

	// Search
	Route::get('/databook/search', 'DataBookController@search');
	Route::get('/customer/search', 'CustomerController@search');
	Route::get('/users/search', 'UsersController@search');

});

 Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
