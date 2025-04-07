<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\VisionsController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\TestimoniesController;
use App\Http\Controllers\CustTestimoniesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ContactsInfoController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsHeaderController;
use App\Http\Controllers\ProductsFeatureController;
use App\Http\Controllers\ProductsUsedController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Auth\LoginController;
use Spatie\Activitylog\Models\Activity;

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

// Route::get('/about', function () {
//     // return Activity::all()->last();
//     return view('about');
// });

Route::get('/', 'App\Http\Controllers\Frontend\HomeController@index');
Route::get('/about', 'App\Http\Controllers\Frontend\AboutController@index');
Route::get('/contact', 'App\Http\Controllers\Frontend\ContactController@index');
Route::post('/contact', 'App\Http\Controllers\ContactsListController@store');
Route::get('/article', 'App\Http\Controllers\Frontend\ArticleController@index');
Route::get('/article/detail/{id}', 'App\Http\Controllers\Frontend\ArticleController@detail');
Route::get('/product', 'App\Http\Controllers\Frontend\ProductController@index');
Route::get('/product/show/{id}', 'App\Http\Controllers\Frontend\ProductController@show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', 'App\Http\Controllers\AdminPagesController@login')->name('login');
Auth::routes();

Route::get('/admin/home', 'App\Http\Controllers\AdminPagesController@home');

Route::resource('/admin/about','App\Http\Controllers\AboutsController');
Auth::routes();

Route::resource('/admin/vision','App\Http\Controllers\VisionsController');
Auth::routes();

Route::resource('/admin/mission','App\Http\Controllers\MissionsController');
Auth::routes();

Route::resource('/admin/testimoni','App\Http\Controllers\TestimoniesController');
Auth::routes();

Route::resource('/admin/custTestimoni','App\Http\Controllers\CustTestimoniesController');
Auth::routes();

Route::resource('/admin/article','App\Http\Controllers\ArticlesController');
Auth::routes();

Route::resource('/admin/contact','App\Http\Controllers\ContactsController');
Auth::routes();

Route::resource('/admin/contactinfo','App\Http\Controllers\ContactsInfoController');
Auth::routes();

Route::resource('/admin/contactlist','App\Http\Controllers\ContactsListController');
Auth::routes();

Route::resource('/admin/productheader','App\Http\Controllers\ProductsHeaderController');
Auth::routes();

Route::resource('/admin/product','App\Http\Controllers\ProductsController');
Auth::routes();

Route::resource('/admin/productfeature','App\Http\Controllers\ProductsFeatureController');
Auth::routes();

Route::resource('/admin/productused','App\Http\Controllers\ProductsUsedController');
Auth::routes();

Route::resource('/admin/eventlog','App\Http\Controllers\EventLogsController');
Auth::routes();

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
