<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EntryController as AdminEntryController;
use App\Http\Controllers\Staff\EntryController as StaffEntryController;
use App\Http\Controllers\Client\EntryController as ClientEntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
// Route::middleware(['auth','role:admin'])
//     ->prefix('admin')
//     ->group(function () {
//         Route::resource('entries', AdminEntryController::class);
//     });
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\EntryController::class,'index'])
        ->name('admin.dashboard');

    Route::resource('entries', App\Http\Controllers\Admin\EntryController::class);
});
/*
|--------------------------------------------------------------------------
| STAFF ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:staff'])
    ->prefix('staff')
    ->group(function () {
        Route::get('dashboard', [StaffEntryController::class,'index'])->name('staff.dashboard');
        Route::post('upload/{id}', [StaffEntryController::class,'upload'])->name('staff.upload');
    });

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:client'])
    ->prefix('client')
    ->group(function () {
        Route::get('dashboard', [ClientEntryController::class,'index'])->name('client.dashboard');
    });

require __DIR__.'/auth.php';
