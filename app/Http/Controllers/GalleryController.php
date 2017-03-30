<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        return view('galleries', compact('galleries'));
    }

    public function show($slug)
    {
        $gallery = Gallery::where('folder', $slug)->firstOrFail();

        return view('galleries-show', compact('gallery'));
    }
}
