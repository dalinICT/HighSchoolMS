<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\UploadImage;


class ProfileController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('backends.setting.profile',['user'=>$user]);
    }


    public function update(Request $request)
    {
       
    // Get the authenticated user (assuming the user is logged in)
    $user = auth()->user();

    // Validate the input fields from the request
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id . ',id',
        'password' => 'nullable|required_with:password_confirmation|confirmed',
        'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:208',
    ]);

    // If the password is provided, hash it and add it to the $validated array
    if ($request->filled('password')) {
        $validated['password'] = bcrypt($request->password);
    } else {
        // To avoid updating with an empty password.
        unset($validated['password']);
    }

    // If a new profile image is provided, save it and update the 'profile' field
    if ($request->hasFile('profile')) {
        // Assuming 'saveImage' method works correctly and returns the filename.
        $name = $this->saveImage($request->file('profile'));
        $validated['profile'] = $name;
    }
   
    // Update the user's profile with the validated data
    $user->update($validated);

    // Prepare a success notification message to be displayed after the update
    $notification = array(
        'message' => 'User Profile Update Successfully',
        'alert-type' => 'success'
    );

    // Redirect back to the profile update page with the success notification
    return redirect()->back()->with($notification);
    }

}
