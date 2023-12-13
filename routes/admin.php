<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    /**
     * Settings
     */
    Route::get('/settings/site', 'Admin\SettingController@site')->name('settings.site');
    Route::put('/settings/update', 'Admin\SettingController@update')->name('settings.update');

    /**
     * Profile
     */
    Route::get('/profile', 'Admin\ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'Admin\ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'Admin\ProfileController@destroy')->name('profile.destroy');

});