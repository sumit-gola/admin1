<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TeamManager;
use App\Http\Controllers\PageManager;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/login',[AuthManager::class,'loginView'])->name('auth.sign-in');
Route::get('/sign-up',[AuthManager::class,'registrationView'])->name('auth.sign-up');

Route::post('/login', [AuthManager::class, 'login'])->name('auth.login');
Route::post('/sign-up', [AuthManager::class,'registrationPost'])->name('auth.registration');
Route::get('/logout', [AuthManager::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    })->name('dashboard ');

    Route::get('/teams',[TeamManager::class,'index']);
    Route::get('/menu',[TeamManager::class,'index']);

});



Route::resource('team',TeamManager::class);









Route::get('/menu',[TeamManager::class,'index'])->name('page.menu');
Route::get('/about', function () {
    return view('pages/about');
})->name('web.about');
