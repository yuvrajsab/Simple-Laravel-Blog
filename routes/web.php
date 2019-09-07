<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'PagesController@getIndex');

Route::get('about', 'PagesController@getAbout');

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact')->name('post_contact');

Route::resource('post', 'PostController');
Route::get('blog/{slug}', 'BlogController@getPost')->where('slug', '[\w\d\-\_]+')->name('blog.single');
Route::get('blog', 'BlogController@getIndex')->name('blog.index');

Auth::routes();

Route::resource('category', 'CategoryController')->except([
    'show', 'update', 'edit'
])->middleware('auth');

Route::resource('tag', 'TagController')->except([
    'update', 'edit'
]);

Route::post('comment/{post_id}', 'CommentController@store');
Route::delete('comment/{comment_id}', 'CommentController@destroy');

Route::delete('post/{post_id}/delete/{filename}', 'PostController@deleteFile')->name('file_delete');