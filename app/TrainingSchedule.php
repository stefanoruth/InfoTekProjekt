<?php

namespace App;

use App\Team;

class TrainingSchedule
{
    public function list()
    {
        return Team::all()->groupBy(function ($team) {
            return $team->options['training']['time']['from'];
        })->sortBy(function ($group, $time) {
            return $time;
        })->map(function ($sub) {
            return $sub->groupBy(function ($team) {
                return $team->options['training']['day'];
            })->sortBy(function ($group, $date) {
                return date('N', strtotime($date));
            })->all();
        });
    }
}
