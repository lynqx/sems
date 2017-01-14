<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/***********************
 **** Authentication ****
 ************************/
Auth::routes();
Route::group(['prefix' => 'api'], function () {
    Route::post('/login', ['as' => 'api_login', 'uses' => 'Auth\LoginController@postApiLogin']);
});
Route::get('/logoff', 'Auth\LoginController@logoff');

/***********************
 *****   Dashboard  *****
 ************************/
Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);


/***********************
 *****   Category  *****
 ************************/
Route::group(['prefix' => 'category'], function () {
    Route::get('/', ['as' => 'category', 'uses' => 'Category\IndexController@home']);
    Route::get('create', ['uses' => 'Category\CreateController@home']);
    Route::post('create', ['as' => 'category.createaction', 'uses' => 'Category\CreateController@saveCreate']);

    //Route::model('category', 'App\Category');
    Route::get('edit/{slug}', 'Category\UpdateController@home');
    Route::post('edit', 'Category\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Category\DeleteController@index');
});


/***********************
 *****   Fees  *****
 ************************/
Route::group(['prefix' => 'fee'], function () {
    Route::get('/', ['as' => 'fee', 'uses' => 'Fee\IndexController@home']);
    Route::get('create', ['uses' => 'Fee\CreateController@home']);
    Route::post('create', ['as' => 'fee.createaction', 'uses' => 'Fee\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Fee\UpdateController@home');
    Route::post('edit', 'Fee\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Fee\DeleteController@index');

    Route::get('createlist', ['uses' => 'Fee\CreateController@feelist']);
    Route::post('createlist', ['as' => 'fee.createlistaction', 'uses' => 'Fee\CreateController@listCreate']);
});

/***********************
 *****   Students  *****
 ************************/
Route::group(['prefix' => 'students'], function () {
    Route::get('/', ['as' => 'students', 'uses' => 'Students\IndexController@home']);
    Route::get('create', ['uses' => 'Students\CreateController@home']);
    Route::post('create', ['as' => 'students.createaction', 'uses' => 'Students\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Students\UpdateController@home');
    Route::post('edit', 'Students\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Students\DeleteController@index');

    Route::get('view/{slug}', 'Students\ViewController@home');
});

/***********************
 *****   Parents  *****
 ************************/
Route::group(['prefix' => 'parents'], function () {
    Route::get('/', ['as' => 'parents', 'uses' => 'Parents\IndexController@home']);
    Route::get('create', ['uses' => 'Parents\CreateController@home']);
    Route::post('create', ['as' => 'parents.createaction', 'uses' => 'Parents\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Parents\UpdateController@home');
    Route::post('edit', 'Parents\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Parents\DeleteController@index');

    Route::get('view/{slug}', 'Parents\ViewController@home');

});

/***********************
 *****   Teachers  *****
 ************************/
Route::group(['prefix' => 'teachers'], function () {
    Route::get('/', ['as' => 'teachers', 'uses' => 'Teachers\IndexController@home']);
    Route::get('create', ['uses' => 'Teachers\CreateController@home']);
    Route::post('create', ['as' => 'teachers.createaction', 'uses' => 'Teachers\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Teachers\UpdateController@home');
    Route::post('edit', 'Teachers\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Teachers\DeleteController@index');
});



Route::get('/about', function () {
    return 'This is our about page';
});


Route::get('/contact', function () {
    return 'This is our contact page';
});


