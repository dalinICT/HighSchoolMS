<?php

use Illuminate\Support\Facades\Route;

Route::get('/adminback', function () {
    return view('admin.index');
});