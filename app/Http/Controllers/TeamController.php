<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
    	$teams = Team::orderBy('title', 'ASC')->get();

    	return view('teams', compact('teams'));
    }
}
