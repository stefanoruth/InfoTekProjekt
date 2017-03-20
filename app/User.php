<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

    public function getAgeAttribute(){
        return Carbon::now()->diffInYears($this->birthdate);
    }
}
