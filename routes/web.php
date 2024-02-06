<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TeamManager;
use App\Http\Controllers\PageManager;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogManager;

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

    Route::resource('team',TeamManager::class);
    Route::get('/menu',[TeamManager::class,'index'])->name('page.menu');

    Route::get('/add-blog', function () {
        return view('dashboard.pages.blogs.addblog ');
    });
    Route::post('/add-blog',[PagesController::class,'store'] )->name('blogs.add-blog');
});







Route::get('/blogs/{id?}',[BlogManager::class,'singleUser'])->name('blogs.show');
Route::get('/blogdetails',[PagesController::class,'index'])->name('blogdetails');

Route::get('/all-blogs',[BlogManager::class,'allBlogs'])->name('all-blogs');


