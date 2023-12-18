<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    /**
     * Dashboard
     */
    Route::get('/dashboard', 'Admin\DashboardController')->name('dashboard');

    /**
     * Settings
     */
    Route::get('/settings/site', 'Admin\SettingController@site')->name('settings.site');
    Route::get('/settings/banner', 'Admin\SettingController@banner')->name('settings.banner');
    Route::get('/settings/about', 'Admin\SettingController@about')->name('settings.about');
    Route::patch('/settings/update', 'Admin\SettingController@update')->name('settings.update');

    /**
     * Category
     */
    Route::resource('/categories', 'Admin\CategoryController')->except('show');

    /**
     * Food
     */
    Route::resource('/foods', 'Admin\FoodController')->except('show');

    /**
     * Reservation
     */
    Route::resource('/reservations', 'Admin\ReservationController')->except('show');

    /**
     * Profile
     */
    Route::get('/profile', 'Admin\ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'Admin\ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'Admin\ProfileController@destroy')->name('profile.destroy');

});
