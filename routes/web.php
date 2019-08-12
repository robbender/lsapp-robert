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

Route::get('/', 'PagesController@index');
Route::get('/services', 'PagesController@services');
Route::get('/about', 'PagesController@about');
Route::get('/posts/index', 'PagesConroller@index');
Route::get('/posts/edit', 'PostsController@update');

Route::get('/posts/create', 'PostsController@create');
// Route::post('/posts', 'PostsController@store');

Route::get('images/{filename}', function ($filename)
{
    $path = storage_path() . '/img/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::resource('posts', 'PostsController');
