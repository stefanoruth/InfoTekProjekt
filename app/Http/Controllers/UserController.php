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
}
