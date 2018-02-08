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
    Route::group(['middleware'=>'admin'], function (){
        Route::get('/admin', 'Admin\AccountController@index')->name('admin');
        Route::get('/categories', 'Admin\CategoriesController@index')->name('categories');
        Route::get('/categories/add', 'Admin\CategoriesController@addCategory')->name('categories.add');
        Route::get('/categories/edit/{id}', 'Admin\CategoriesController@editCategory')->name('categories.edit');
        Route::get('/categories/delete/{id}', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');
    });

});
