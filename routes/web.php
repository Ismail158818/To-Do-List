<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PController;


Route::get('/Home', function () {
    return view('Home');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::controller(PController::class)->group(function () {

    Route:: view('','Home');
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile',  'update')->name('profile.update');
    Route::delete('/profile',  'destroy')->name('profile.destroy');
    Route::get('send-name','send_name')->name('send.name');
    Route::get('insert-task','insert_task')->name('insert.task');

    Route::post('store-task','store_task')->name('store.task');
    Route::post('store-type','store_type')->name('store.type');
    Route::view('insert-type','InsertTypePage')->name('insert.type');
    Route::view('home-page','Home')->name('Home');
    Route::get('delete-type/{id}','delete_type')->name('delete.type');
    Route::get('delete-task/{id}','delete_task')->name('delete.task');
    Route::get('complete-task/{id}','complete_task')->name('complete.task');
    Route::post('store-comp','store_comp')->name('store.comp');
    Route::view('admin','admin')->name('admin');#
    Route::get('req','req')->name('req');
    Route::view('contact','contact')->name('contact');
    });
});
Route::view('about','about')->name('about');
require __DIR__.'/auth.php';

