<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $dates = [
        'start_at',
        'ends_at',
        'deleted_at',
    ];

    protected $guarded = [];

    public function link()
    {
        return route('events.show', $this->id);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_users');
    }

    public function isAttending($userId)
    {
        return $this->users()->where('user_id', $userId)->count() > 0;
    }

    public function attending()
    {
        return $this->users()->count();
    }

    public function isOpen()
    {
        return strtotime($this->start_at) > time();
    }
}
