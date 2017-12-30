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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

//***Other public routes should be added here

Auth::routes();
Route::group(
    [
    'middleware' => 'auth'
    ],
    function () {
        Route::resource('/dashboard', 'DashboardController');
        Route::resource('/topics', 'TopicsController');

        //SUB-TOPICS
        Route::get('/topics/{topic}/sub-topic/create', 'TopicsController@newSubTopic');
        Route::post('/topics/{topic}/sub-topic/store', 'TopicsController@addSubTopic');

        Route::get('/profile/{profile}', 'ProfileController@index');
        Route::resource('/profile', 'ProfileController', [ 'only' => ['edit', 'update']]);

        //***Place your auth restricted routes here
    }
);
