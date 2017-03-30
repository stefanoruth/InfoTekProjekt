<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        return view('profile', compact('user'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name'      => 'required',
            'email'     => 'required|unique:users,email,'.auth()->id(),
            'password'  => 'confirmed',
            'birthdate' => 'required|date_format:Y-m-d',
            'gender'    => 'required|in:male,female',
        ]);

        $user = auth()->user();
        $user->name = request('name');
        $user->email = request('email');
        $user->birthdate = strtotime(request('birthdate'));
        $user->gender = request('gender');
        if (request('password')) {
            $user->password = bcrypt(request('password'));
        }
        $user->save();

        return redirect()->route('user.profile');
    }
}
