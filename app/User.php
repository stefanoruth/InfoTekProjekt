<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Billable;

    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'birthdate' => 'date',
    ];

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return Carbon::now()->diffInYears($this->birthdate);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_users')->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function listTeams()
    {
        return $this->teams()->pluck('title')->all();
    }

    public function plan($key = null)
    {
        $plan = collect(config('services.stripe.plans'))
            ->where('age.0', '<', $this->age)
            ->where('age.1', '>', $this->age)
            ->first();

        if (is_null($plan)) {
            throw new \Exception('No valid stripe plan available.');
        }

        if (is_null($key)) {
            return $plan;
        }

        return Arr::get($plan, $key);
    }
}
