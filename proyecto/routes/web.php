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

// Ruta para buscador por titulo
Route::get('/home/buscador', 'SearchController@index')->name('posts.buscador');

// Rutas para buscador por categorias
Route::get('/home/categorias', 'SearchController@listCategorias')->name('categorias.listado');
Route::get('/home/categorias/{categoria}', 'SearchController@postCategorias')->name('categorias.posts');

// Rutas relacionados con el guardado de publicaciones como favoritas
Route::post('/posts/{post}', 'UserController@favPost')->name('users.fav');
Route::get('/users/favoritos', 'UserController@listFav')->name('posts.fav');
Route::delete('/post/{post}', 'UserController@deleteFav')->name('posts.deleteFav');


// Rutas para usuarios y posts
Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');

Route::put('user/{user}', 'UserController@contraseña')->name('users.contraseña');



//Rutas unicamente para los administradores
Route::group(['middleware' => ['admin']], function () {
    //Rutas relacionadas con usuarios
    Route::get('home/admin/users', 'AdminController@usersList')->name('admin.users');
    Route::delete('home/admin/users/{user}', 'AdminController@usersDestroy')->name('admin.users.destroy');

    //Rutas relacionadas con posts
    Route::get('home/admin/posts', 'AdminController@postsList')->name('admin.posts');
    Route::delete('home/admin/posts/{post}', 'AdminController@postsDestroy')->name('admin.posts.destroy');

    //Rutas relacionadas con comentarios
    Route::get('home/admin/comments', 'AdminController@commentsList')->name('admin.comments');
    Route::delete('home/admin/comments/{comment}', 'AdminController@commentsDestroy')->name('admin.comments.destroy');

    //Rutas relacionadas con categorias
    Route::get('home/admin/categories', 'AdminController@categoriesList')->name('admin.categories');
    Route::post('home/admin/categories', 'AdminController@categoriesStore')->name('admin.categories.store');
    Route::get('home/admin/categories/{category}', 'AdminController@categoriesEdit')->name('admin.categories.edit');
    Route::put('home/admin/categories/{category}', 'AdminController@categoriesUpdate')->name('admin.categories.update');
    Route::delete('home/admin/categories/{category}', 'AdminController@categoriesDestroy')->name('admin.categories.destroy');

    //Resource para las rutas del administrador
    Route::resource('home/admin', 'AdminController');
});

//Ruta para guardar/eliminar los comentarios
Route::post('/posts/{post}/comments', 'CommentController@create')->name('comments.create');
Route::delete('/posts/post/{comment}', 'CommentController@destroy')->name('comments.destroy');