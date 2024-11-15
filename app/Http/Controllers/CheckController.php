<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Check;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        $rand = rand(100000, 999999);
        Check::create([
            'user_id' => auth()->user()->id,
            'value' => $rand,
        ]);
        SendEmail::dispatch(auth()->user()->email, $rand);
        return redirect()->back();
    }
    public function verify()
    {
        return view('check');
    }
    public function check(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'value' => 'required|min:6,max:6'
        ]);
        $data = Check::all();
        $len = count($data) - 1;
        if ($data[$len]->value == $request->value && $data[$len]->user_id == $request->user_id) {
            $user = User::findOrFail($data[$len]->user_id);
            if ($user) {
                $user->update([
                    'email_verified_at' => date('Y-m-d H:i:s')
                ]);
                return redirect(route('index'))->with('success', __('auth.verified'));
            }else {
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
