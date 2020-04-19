<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// Route des pages

    // Index
    Route::get('pages', 'PagesController@index')->name('pages.index');

// Route des produits

    // Index Start
    Route::get('produits', 'ProduitsController@index')->name('produits.index');
    
// Route des categories

    // Index
    Route::get('categories', 'CategoriesController@index')->name('categories.index');

