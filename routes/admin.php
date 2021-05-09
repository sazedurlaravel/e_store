<?php
Auth::routes();
Route::group(['prefix'  =>  'admin'], function () {
 
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
    //category routes
    Route::get('/','App\Http\controllers\backend\AdminController@index')->name('admin.dashboard.index');
    Route::get('/category','App\Http\controllers\CategoryController@index')->name('category.index');
    Route::get('/category/create','App\Http\controllers\CategoryController@create')->name('category.create');
    Route::get('/category/edit/{id}','App\Http\controllers\CategoryController@edit')->name('category.edit');
    //Route::get('/catData','App\Http\controllers\CategoryController@catData')->name('category.data');
    Route::post('/category/store','App\Http\controllers\CategoryController@store')->name('category.store');
    Route::post('/category/update/{id}','App\Http\controllers\CategoryController@update')->name('category.update');
    Route::get('/category/delete/{id}','App\Http\controllers\CategoryController@destroy')->name('category.delete');
    //products routes
    Route::get('/products/view','App\Http\controllers\ProductController@view_product')->name('product.view');
    Route::get('/products/add','App\Http\controllers\ProductController@create')->name('product.add');
    Route::get('/products/edit/{id}','App\Http\controllers\ProductController@edit')->name('product.edit');
    Route::post('/products/store','App\Http\controllers\ProductController@store')->name('product.store');
    Route::post('/products/update/{id}','App\Http\controllers\ProductController@update')->name('product.update');
    Route::get('/products/delete/{id}','App\Http\controllers\ProductController@destroy')->name('product.delete');
    //brand routes
    Route::get('/brand','App\Http\controllers\BrandController@index')->name('brand.index');
    Route::get('/brand/create','App\Http\controllers\brandController@create')->name('brand.create');
    Route::get('/brand/edit/{id}','App\Http\controllers\brandController@edit')->name('brand.edit');
    Route::post('/brand/store','App\Http\controllers\BrandController@store')->name('brand.store');
    Route::post('/brand/update/{id}','App\Http\controllers\brandController@update')->name('brand.update');
    Route::get('/brand/delete/{id}','App\Http\controllers\brandController@destroy')->name('brand.delete');

    //tags route
    Route::get('/tag','App\Http\controllers\TagController@index')->name('tag.index');
    Route::get('/tag/create','App\Http\controllers\TagController@create')->name('tag.create');
    Route::get('/tag/edit/{id}','App\Http\controllers\TagController@edit')->name('tag.edit');
    Route::post('/tag/store','App\Http\controllers\TagController@store')->name('tag.store');
    Route::post('/tag/update/{id}','App\Http\controllers\TagController@update')->name('tag.update');
    Route::get('/tag/delete/{id}','App\Http\controllers\TagController@destroy')->name('tag.delete');

   
});

