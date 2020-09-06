<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('auth.adminregister');
    }
    public function adminregister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('admin/register')
                        ->withErrors($validator)
                        ->withInput();
        }
        $post = new Admin();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->role = $request->role;
        $post->password =Hash::make( $request->password);
        $post->save();
        return redirect()->route('dashboard');
    }
}
