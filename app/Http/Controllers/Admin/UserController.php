<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::latest()->get();

        return view('backends.setting.user.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('backends.setting.user.new',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|confirmed',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:208',

        ]);

        // Get the image file and save into the database
        $profilePath = null;
        if($request->hasFile('profile')){
            $profileFile = $request->file('profile');
            $profilePath = $profileFile->store('profiles','public');
        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'profile' => $profilePath,
        ]);
        $user->syncRoles($request->roles);

        $notification = array(
            'message' => 'User Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.users.index')->with($notification );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::get();
        $user->roles;

        // Get the user profile image path from the database and show on webpage.
        $profileImagePath = asset('storage/' . $user->profile);
       return view('backends.setting.user.edit',['user'=>$user,'roles' => $role, 'profileImagePath' => $profileImagePath]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
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

        $user->syncRoles($request->roles);

        $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, $id)
    {
        $user = User::find($id);
        $user->delete();

        $role->delete();

        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.users.index')->with($notification);
    }
}
