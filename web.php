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

// ホーム
Route::get('/home', 'HomeController@index')->name('home');
// スレッド一覧
Route::get('/threads', 'PostsController@threads');
// スレッド作成フォーム
Route::get('/threads/build', 'PostsController@buildForm');
// スレッド作成
Route::post('/threads', 'PostsController@build');
// スレッド詳細(コメント一覧)
Route::get('/threads/{id}', 'PostsController@comments')->where('id', '[0-9]+');
// コメント投稿
Route::post('/threads/{thread}', 'CommentsController@store');


/*
|--------------------------------------------------------------------------
| else default
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function() {
    // 本登録ユーザーだけ表示できるページ
    Route::get('verified',  function(){
        return 'あなたは本登録完了ユーザーです。';
    });
});
