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
});

// Route Admin Dashboard

// Route::get('/dashboard', function(){
//     return view('welcome');
// })->middleware(['front'])->name('dashboard');
// Route::get('/test', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route to change language from english to khmer and switch back
// Route::get('/lang/{locale}', function($locale = null){

//     session()->put('locale', $locale);
//     return redirect()->back();
// });
Route::get('/lang/{locale}', function($locale = null){
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    // session()->put('locale', $locale);
    return redirect()->back();
});


// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware(['front'])->name('dashboard');


require __DIR__.'/front_auth.php';

//================= Admin routes ===============//


Route::get('/admin/dashboard', function () {
    return view('backends.admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

// Route::get('/', function () {
//     return view('backends.admin.teacher.create_teacher');
// });


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
