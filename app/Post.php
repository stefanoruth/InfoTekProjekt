<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function link()
    {
    	return route('post.show', $this->slug);
    }

    public function getShortAttribute()
    {
    	return str_limit($this->body, 200);
    }
}
