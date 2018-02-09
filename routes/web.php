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
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function (){
    route::post('/register', 'Auth\RegisterController@register');
    route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    route::get('/login', 'Auth\Logincontroller@showLoginForm')->name('login');
    route::post('/login', 'Auth\Logincontroller@login')->name('login');

});
//account
Route::group(['middleware'=>'auth'], function (){
    route::get('/logout', function (){
        \Auth::logout();
        return redirect(route('login'));
    })->name('logout');
   route::get('/my/account', 'AccountController@index')->name('account');

   //admin
    Route::group(['middleware'=>'admin', 'prefix'=>'admin'], function (){
        Route::get('/', 'Admin\AccountController@index')->name('admin');
        //Categories

        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::post('/categories/add', 'Admin\CategoriesController@addRequestCategory');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')->name('categories.edit');
        Route::post('/categories/edit/{id}', 'Admin\CategoriesController@editRequestCategory');
        Route::delete('/categories/delete}', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
        //articles

        Route::get('/articles', 'Admin\ArticlesController@index')->name('articles');
        Route::get('/articles/add', 'Admin\ArticlesController@addArticle')->name('articles.add');
        Route::post('/articles/add', 'Admin\ArticlesController@addRequestArticle');
        Route::get('/articles/edit/{id}', 'Admin\ArticlesController@editArticle')->name('articles.edit');
        Route::post('/articles/edit/{id}', 'Admin\ArticlesController@editRequestArticle');
        Route::delete('/articles/delete}', 'Admin\ArticlesController@deleteArticle')->name('articles.delete');
    });

});
