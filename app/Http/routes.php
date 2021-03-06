<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
Route::get('/', function () {
    return view('about');
});
Route::get('notes/{note}', function ($note) {
    if (view()->exists('notes.' . $note)) {
        return view('notes.' . $note);
    }
    abort(404);
});
Route::get('micro-services/{service}', function ($service) {
    if (view()->exists('micro-services.' . $service)) {
        return view('micro-services.' . $service);
    }
    abort(404);
});

Route::group(['prefix' => 'api'], function () {
    Route::get('user-info', function () {
        $ret['ip'] = $_SERVER['REMOTE_ADDR'];
        $ret['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
        return response($ret);
    });
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => ['web']], function () {
    //
});
