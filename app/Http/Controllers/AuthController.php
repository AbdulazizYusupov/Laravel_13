<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Check;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage ()
    {
        return view('Auth.login');
    }
    public function login (Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if (auth()->attempt($data)) {
            return redirect('/');
        }else{
            return redirect(route('index'))->with('error', 'Invalid Credentials');
        }
    }
    public function registerPage ()
    {
        return view('Auth.register');
    }
    public function register (Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $rand = rand(100000, 999999);

        $check = Check::create([
            'user_id' => $user->id,
            'value' => $rand,
        ]);

        SendEmail::dispatch($user->email, $rand);

        return redirect(route('verify',absolute: false));
    }
    public function logout ()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Logged Out Successfully');
    }
}
