<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $casts = [
		'options' => 'json'
	];

    public function users()
    {
    	return $this->belongsToMany(User::class, 'team_users')->withTimestamps();
    }

    public function link()
    {
    	return route('teams.show', $this->id);
    }
}
