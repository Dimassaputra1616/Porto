<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/profile', 'profile')->name('profile');

Route::redirect('/projects', '/#projects')->name('projects');
Route::redirect('/lab', '/#lab')->name('lab');
Route::redirect('/about', '/profile')->name('about');
Route::redirect('/contact', '/#contact')->name('contact');
