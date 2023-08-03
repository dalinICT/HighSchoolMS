<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\MailSettingController;

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

// Front page route
Route::get('/', function () {
    return view('welcome');
})->name('front_page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/lang/{locale}', function($locale = null){
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    // session()->put('locale', $locale);
    return redirect()->back();
});


require __DIR__.'/front_auth.php';

//================= Admin routes ===============//

Route::middleware(['auth:web,front'])->group(function (){
    Route::get('/admin/dashboard', function () {
        return view('backends.admin.dashboard');
    })->name('admin.dashboard');
});







require __DIR__.'/auth.php';



// All route for admin user to contorll
Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
        Route::resource('roles','RoleController');

        // Delete role route
        Route::get('/delete/role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');

        Route::resource('permissions','PermissionController');

        // Delete permission route
        Route::get('/delete/permission/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('permissions.destroy');

        Route::resource('users','UserController');

        // Delete user route
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        // Route::resource('posts','PostController');

        Route::get('/profile',[App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profile');
        Route::post('/profile-update','ProfileController@update')->name('profile.update');

        // Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        // Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');



        // ==========================================================================//
        //  Create Edit Update Delete Show Teacher Info
        //===========================================================================//
        Route::get('/teachers/list', [TeacherController::class, 'index'])->name('teachers.index');
        Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
        Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');


        // ============================================================================//
        //  End Create Edit Update Delete Show Teacher Info
        //=============================================================================//


});
