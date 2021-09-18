<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register/index', [
            'tab' => 'Registration',
            'active' => 'registration'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|min:4|max:32|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull!');
        // return redirect('/login');
        
        return redirect('/login')->with('success', 'Registration successfull!');
    }
}
