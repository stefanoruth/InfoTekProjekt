<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
	public function link()
	{
		return route('galleries.show', [$this->folder]);
	}

	public function images()
	{
		return collect(Storage::files('public/'.$this->folder))->map(function($image){
			$image = str_replace('public/', '', $image);

			return url('storage/'.$image);
		});
	}

	public function imageCount()
	{
		return count(Storage::files('public/'.$this->folder));
	}
}
