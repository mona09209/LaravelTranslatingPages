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



 Route::get('test', function () {

    $data = ['title' => 'Programming', 'body' => 'php'];
    Mail::To('monamohamed729222@gmail.com')->send(new NotifyEmail($data));
    dd("email is sent");  
}); 
 
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::group(['prefix' => 'offers'], function () {

            // Route::get('/crud','App\Http\Controllers\CrudController@fillable');
            // Route::get('/create','App\Http\Controllers\CrudController@create');
            Route::get('create','App\Http\Controllers\CrudController@create');
            Route::post('store','App\Http\Controllers\CrudController@store')->name('offers.store');
            Route::get('all','App\Http\Controllers\CrudController@getAllOffers');
            Route::get('edit/{offer_id}','App\Http\Controllers\CrudController@editOffer');
            Route::post('update/{offer_id}','App\Http\Controllers\CrudController@updateOffer')->name('offers.update');
            Route::get('youtube','App\Http\Controllers\CrudController@getVideo');
            Route::get('delete/{offer_id}','App\Http\Controllers\CrudController@deleteOffer')->name('offers.delete');

         });
      

    });
//////////////////////////// Ajax//////////////////////////////////

Route::group(['prefix'=>'AjaxOffers'], function () {
    Route::get('create','App\Http\Controllers\OfferController@create');
    Route::post('save','App\Http\Controllers\OfferController@save')->name('ajax.offers.save');
    Route::get('all','App\Http\Controllers\OfferController@all')->name('ajax.offers.all');
    Route::get('edit{offer_id}','App\Http\Controllers\OfferController@edit')->name('ajax.offers.edit');
    Route::post('update','App\Http\Controllers\OfferController@update')->name('ajax.offers.update');
    Route::post('delete','App\Http\Controllers\OfferController@delete')->name('ajax.offers.delete');

}); 

