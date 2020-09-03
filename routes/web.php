<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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
});

Route::resource('/posts','PostsController');

// users add route
Route::get('/users/create',[
    'uses'=>'UsersController@create',
    'as'=>'user.add'
]);

// users register route
Route::post('/users',[
    'uses'=>'UsersController@register',
    'as'=>'users.store'
]);

// users login route
Route::get('/users/login',[
    'uses'=>'UsersController@login',
    'as'=>'users.login'
]);
// users auth route
Route::post('/users/auth',[
    'uses'=>'UsersController@auth',
    'as'=>'users.auth'
]);
// users logoutroute
Route::get('/users/logout',[
    'uses'=>'UsersController@logout',
    'as'=>'users.logout'
]);

//add comment route
Route::post('/comment/add',[
    'uses'=>'CommentsController@store',
    'as'=>'comment.store'
]);
// //show comment route
// Route::post('/comments',[
//     'uses'=>'CommentsController@index',
//     'as'=>'comment.show'
// ]);
Route::get('offres/{id}',[
    'uses'=>'PostsController@destroy',
    'as'=>'posts.delete'
] );

