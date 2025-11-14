<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use  Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AccountController extends Controller
{
    //
    public function login()
    {
        return view('account.login');
    }

    public function register()
    {
        return view('account.register');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6', // confirm check
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('tenant.login')->with('success', 'Registration successful! Please login.');
    }



    public function authenticate(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                if ($user->role == 'manager') {
                    return redirect()->route('manger.dashboard');
                } else if ($user->role == 'salesman') {
                    return redirect()->route('saleman.dashboard');
                } else {
                    return redirect()->route('tenant.dashboard');
                }
            }
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login success
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            // Invalid credentials
            return redirect()->back()->with('error', 'Invalid email or password.')->withInput();
        }
    }


    public function profile()
    {
        $user = Auth::user();
         
        return view('account.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();

       

        if (!$user) {
            abort(401, 'Unauthenticated');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if entered
        if (empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        // dd($request->all());
        $user->save();


        // $user->save();

        return redirect()->route('account.profile')
            ->with('success', 'Profile updated successfully!');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
