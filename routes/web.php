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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function () {
    return 'FROM POST';
});
/*
Route::put();
Route::delete();
Route::patch();
          */
Route::match(['GET', 'POST'], '/test2', function() {
    return 'OK';
});

Route::any('/test3', function() {
    return 'OK!';
});


Route::get('/hand', function () {
    return view('test');
});

Route::group(['prefix' => 'test'], function () {
    Route::any('/', 'TestController@index');
    Route::get('/users', 'TestController@getUsers');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
        Route::get('/', 'AdminApiController@index');
    });
});
/*
Route::get('user/{id?}', function ($id = null) {
    return '#1 User '.$id;
});
*/
Route::get('user/{id}/{name}', 'TestController@user')
    ->name('getUser')
    ->where([
        'name' => '[a-zA-Z]+'
    ]);

Route::get('user/{id}/{name}', 'TestController@userWrong')
    ->name('getUser')
    ->where([
        'name' => '[a-zA-Z0-9]+',
        'id' => '[a-zA-Z0-9]+'
    ]);