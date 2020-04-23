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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');




//Rutas unicamente para los administradores
Route::group(['middleware' => ['admin']], function () {
    Route::get('home/admin/users', 'AdminController@usersList')->name('admin.users');
    Route::get('home/admin/posts', 'AdminController@postsList')->name('admin.posts');
    Route::get('home/admin/comments', 'AdminController@commentsList')->name('admin.comments');
    Route::resource('home/admin', 'AdminController');
});


//Ruta para guardar/eliminar los comentarios
Route::post('/posts/{post}/comments', 'CommentController@create')->name('comments.create');
Route::delete('/posts/post/{comment}', 'CommentController@destroy')->name('comments.destroy');
