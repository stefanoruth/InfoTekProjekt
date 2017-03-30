<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    
    public function link()
    {
        return route('post.show', $this->slug);
    }

    public function getShortAttribute()
    {
        return str_limit(strip_tags($this->body), 200);
    }
}
