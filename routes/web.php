<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\admin'], function() {
        Route::prefix('admin')->middleware('admin')->group(function(){
            Route::resource('/panel', 'PanelController');
            Route::resource('/category', 'CategoryController');
            Route::resource('/article', 'ArticleController');
            Route::resource('/setting', 'SettingController');
            Route::resource('/contact', 'ContactController');
            Route::resource('/user', 'UserController');

        Route::prefix('categories')->group(function(){
            Route::get('/status/{id}', 'CategoryController@status')->name('category.status');;
            Route::get('/search', 'CategoryController@search')->name('category.search');
        });

        Route::prefix('articles')->group(function(){
            Route::get('/status/{id}', 'ArticleController@status')->name('article.status');;
            Route::get('/search', 'ArticleController@search')->name('article.search');
        });

        Route::prefix('contacts')->group(function(){
            Route::get('/search', 'ContactController@search')->name('contact.search');
        });

        Route::prefix('users')->group(function(){
            Route::get('/status/{id}', 'UserController@status')->name('user.status');;
            Route::get('/search', 'UserController@search')->name('user.search');
        });
    });
});


Route::group(['namespace' => 'App\Http\Controllers\main'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about');
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@send');

    Route::prefix('article')->group(function(){
        Route::get('/delete/{id}', 'ArticleController@delete');
        Route::get('/edit/{id}', 'ArticleController@edit');
        Route::get('/{category}/{slug}', 'ArticleController@index');
        Route::post('/create', 'ArticleController@create');
        Route::put('/update/{id}', 'ArticleController@update');
    });

    Route::prefix('category')->group(function(){
        Route::get('/', 'CategoryController@index');
        Route::get('/{slug}', 'CategoryController@articles');
    });

    Route::prefix('auth')->group(function(){
        Route::middleware('authless')->group(function(){
            Route::get('/login', 'AuthController@index')->name('auth.login');;
            Route::post('/login', 'AuthController@logIn')->name('auth.login');
            Route::get('/register', 'AuthController@register')->name('auth.register');;
            Route::post('/register', 'AuthController@signUp')->name('auth.register');
        });

        Route::middleware('auth')->group(function(){
            Route::get('/logout', 'AuthController@logout')->name('auth.logout');
        });
    });

    Route::prefix('profile')->middleware('auth')->group(function(){
        Route::get('/', 'ProfileController@index');
    });
    
    Route::get('/profile/{login}', 'ProfileController@user');
});
