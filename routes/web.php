<?php

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

//use scool\enrollment_payments\Stats\Stats;
//use scool\enrollment_payments\Model\Study;
//use scool\enrollment_payments\Models\Course;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/tokens', function () {
        return view('tokens');
    });
});

Route::get('/test', function () {
    DB::listen(function ($event) {
        dump($event->sql);
        dump($event->bindings);
    });
//    $studies = Study::all();
//    $courses = Course::all();
//    return $courses;
    Stats::of(scool\enrollment_payments\Model\Payment::class);
    return Stats::total();
});

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');


