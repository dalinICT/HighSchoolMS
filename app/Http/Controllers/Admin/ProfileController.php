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
        $user = auth()->user();

        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
            'password' => 'nullable|required_with:password_confirmation|confirmed',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:208',
        ]);

        if($request->filled('password')){
            $validated['password'] = bcrypt($request->password);
        }else{
            // To avoid updating with an empty password.
            unset($validated['password']);
        }

        if($request->hasFile('profile')){
            // Assuming 'saveImage' method works correctly and returns the filename.
            $name = $this->saveImage($request->file('profile'));
            $validated['profile'] = $name;

        }

        $user->update($validated);


        $notification = array(
            'message' => 'User Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile.update')->with($notification);

    }
}
