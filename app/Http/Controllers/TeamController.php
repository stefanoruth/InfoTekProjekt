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

    public function show($id)
    {
    	$team = Team::with('users')->findOrFail($id);

    	return view('teams-show', compact('team'));
    }
}
