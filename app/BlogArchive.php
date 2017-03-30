<?php

namespace App;

use App\Post;

class BlogArchive
{
    public function list()
    {
        return Post::all()->groupBy(function ($post) {
            return $post->created_at->format('Y');
        })->map(function ($group) {
            return $group->groupBy(function ($post) {
                return $post->created_at->format('F');
            })->map(function ($sub) {
                return $sub->count();
            })->sortByDesc(function ($count, $month) {
                return date('m', strtotime($month));
            })->all();
        })->sortByDesc(function ($count, $year) {
            return $year;
        });
    }
}
