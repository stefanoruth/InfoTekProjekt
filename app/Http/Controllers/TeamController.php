<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
    	// return (new \App\TrainingSchedule)->list();

    	$teams = Team::orderBy('title', 'ASC')->get();

    	return view('teams', compact('teams'));
    }

    public function show($id)
    {
    	$team = Team::with(['users' => function($query){
            $query->orderBy('name');
        }])->findOrFail($id);

    	return view('teams-show', compact('team'));
    }
}
