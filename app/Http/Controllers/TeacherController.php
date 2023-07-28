<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\MailSettingController;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // variable = ModelNme::method()
        $teachers = Teacher::get();
        return view("backends.admin.teacher.list_teacher", compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backends.admin.teacher.create_teacher");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // check field is empty
       $validated = $request->validate([
            'image' => 'mimes:png,jpg,jpeg,gif,png',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'position' => 'required',
            'pob' => 'required'
        ]);

        // dd($request->all());
         // get data from input field
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $gender = $request->gender;
        $dob = $request->dob;
        $phone = $request->phone;
        $email = $request->email;
        $position = $request->position;
        $pob = $request->pob;

        // chech image file
        $image = $request->file('image');
        $gen_name = hexdec(uniqid());
        $img_et = strtolower($image->getClientOriginalExtension());
        $img_name = $gen_name.'.'.$img_et;
        $up_location = 'images';
        $last_img = $up_location.'.'.$img_name;
        $image->move($up_location.$img_name);

        $teacher = new Teacher();
        $teacher -> firstname = $firstname;
        $teacher -> lastname = $lastname;
        $teacher -> gender = $gender;
        $teacher -> dob = $dob;
        $teacher -> pob = $pob;
        $teacher -> phone = $phone;
        $teacher -> email = $email;
        $teacher -> position = $position;
        $teacher -> image = $last_img;

        $teacher->save();
        return redirect()->back()->with('success', "Teacher inserted Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
