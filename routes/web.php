<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TeamManager;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/sign-up', function () {
//     return view('auth.signup');
// })->name('auth.sign-up');

Route::get('/login',[AuthManager::class,'loginView'])->name('auth.sign-in');
Route::get('/sign-up',[AuthManager::class,'registrationView'])->name('auth.sign-up');

Route::post('/login', [AuthManager::class, 'login'])->name('auth.login');
Route::post('/sign-up', [AuthManager::class,'registrationPost'])->name('auth.registration');
Route::get('/logout', [AuthManager::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    })->name('dashboard ');
    // Route::get('/teams', function () {
    //     return view('dashboard/pages/team');
    // });
    Route::get('/teams',[TeamManager::class,'index']);

});



Route::resource('team',TeamManager::class);
