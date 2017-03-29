<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
	protected $guarded = [];
	
	public function link()
	{
		return route('galleries.show', [$this->folder]);
	}

	public function images()
	{
		$folder = $this->folder;

		return collect(Storage::files('public/'.$folder))->mapWithKeys(function($image) use ($folder){
			$image = str_replace('public/', '', $image);
			$key = str_replace($folder.'/', '', substr($image, 0, strpos($image, '.')));

			return [$key => url('storage/'.$image)];
		});
	}

	public function imageCount()
	{
		return count(Storage::files('public/'.$this->folder));
	}

	public function addImage(UploadedFile $file)
	{
		$file->store('public/'.$this->folder);
	}

	public function removeImage($filename)
	{
		$file = collect(Storage::files('public/'.$this->folder))->filter(function($file) use ($filename){
			return strpos($file, $filename) !== false;
		})->first();

		Storage::delete($file);
	}
}
