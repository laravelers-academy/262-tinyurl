<?php


use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard', function () {

    return view('dashboard');

})->middleware(['auth'])->name('dashboard');


Route::get('{code}', 'App\Http\Controllers\UrlController@show');

Route::post('url', 'App\Http\Controllers\UrlController@store');

// infinite scroll
Route::get('url/index', 'App\Http\Controllers\UrlController@index');