<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Create Students
    public function create(){
        return view('pages.student.add');
    }

    // View Students
    public function show(){
        return view('pages.student.list');
    }
}
