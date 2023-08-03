<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('front.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Frontuser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Assuming 'front' is the guard for frontuser and 'web'
        // is the guard for the admin user.
        if(Auth::guard('front')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('front_page');
        }elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            // return redirect()->route('admin.dashboard');
            return redirect()->route('login')->with('error', 'Your register is failed!!!');
        }

        // return redirect(RouteServiceProvider::HOME);
        // If authentication fails for some reason,
        return redirect()->route('front_page');
    }
}
