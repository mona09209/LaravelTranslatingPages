<?php

use App\Mail\NotifyEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//use Illuminate\Contracts\Auth\MustVerifyEmail;

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


Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/',function(){

return 'home page';
});
Route::get('/redirect/{service}','App\Http\Controllers\SocialController@redirect');
Route::get('/callback/{service}','App\Http\Controllers\SocialController@callback'); 


Route::group(['prefix' => 'offers'], function () {

   // Route::get('/crud','App\Http\Controllers\CrudController@fillable');
   // Route::get('/create','App\Http\Controllers\CrudController@create');
    
});
/* Route::group(['prefix' => '/'], function () {

    $data = ['name' => 'Programming', 'body' => 'php'];
    Mail::to(users:'monamohamed729222@gmail.com')->send(new NotifyEmail($data));    
}); */

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('create','App\Http\Controllers\CrudController@create');
        Route::post('/store','App\Http\Controllers\CrudController@store')->name('offers.store');

    });
