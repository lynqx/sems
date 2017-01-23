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
 *****   Sessions  *****
 ************************/
Route::group(['prefix' => 'sessions'], function () {
    Route::get('/', ['as' => 'sessions', 'uses' => 'Sessions\IndexController@home']);
    Route::get('create', ['uses' => 'Sessions\CreateController@home']);
    Route::post('create', ['as' => 'sessions.createaction', 'uses' => 'Sessions\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Sessions\UpdateController@home');
    Route::post('edit', 'Sessions\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Sessions\DeleteController@index');
});


/***********************
 *****   Category / Class  *****
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
 *****   Subjects  *****
 ************************/
Route::group(['prefix' => 'subjects'], function () {
    Route::get('/', ['as' => 'subjects', 'uses' => 'Subjects\IndexController@home']);
    Route::get('create', ['uses' => 'Subjects\CreateController@home']);
    Route::post('create', ['as' => 'subjects.createaction', 'uses' => 'Subjects\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Subjects\UpdateController@home');
    Route::post('edit', 'Subjects\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Subjects\DeleteController@index');

    Route::get('class', ['uses' => 'Subjects\ClassController@home']);
    Route::post('class', ['as' => 'subjects.createaction', 'uses' => 'Subjects\ClassController@saveClass']);



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

    Route::get('subject/{slug}', ['uses' => 'Students\SubjectController@home']);
    Route::post('subject', ['as' => 'students.subjectaction', 'uses' => 'Students\SubjectController@saveSubject']);


    Route::get('result/{slug}', ['uses' => 'Students\ResultController@home']);
    Route::post('result', ['as' => 'students.resultaction', 'uses' => 'Students\ResultController@saveResult']);

    Route::get('timetable', ['uses' => 'Students\TimetableController@home']);


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

/***********************
 *****   Children  *****
 ************************/
Route::group(['prefix' => 'children'], function () {
    Route::get('/', ['as' => 'children', 'uses' => 'Children\IndexController@home']);
    Route::get('/{slug}/pay', ['as' => 'children_payment', 'uses' => 'Children\PaymentController@home']);
});



/***********************
 *****   Paystack  *****
 ************************/
Route::post('/pay', [
    'uses' => 'Children\PaymentController@redirectToGateway',
    'as' => 'pay'
]);

Route::get('/payment/callback', 'Children\PaymentController@handleGatewayCallback');


/***********************
 *****   Library  *****
 ************************/
Route::group(['prefix' => 'library'], function () {
    Route::get('/', ['as' => 'library', 'uses' => 'Library\IndexController@home']);
    Route::get('create', ['uses' => 'Library\CreateController@home']);
    Route::post('create', ['as' => 'library.createaction', 'uses' => 'Library\CreateController@saveCreate']);

    Route::get('edit/{slug}', 'Library\UpdateController@home');
    Route::post('edit', 'Library\UpdateController@doEdit');
    Route::post('delete/{slug}', 'Library\DeleteController@index');
});





Route::get('/about', function () {
    return 'This is our about page';
});


Route::get('/contact', function () {
    return 'This is our contact page';
});


