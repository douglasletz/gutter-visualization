<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryShades;

class GalleryController extends Controller
{
    public function project_gallery(){
    	$gallery = Gallery::get();

    	 //dd($gallery);
    	return view('project_gallery',compact('gallery'));
    }
    
    public function gallery_details($id){

    	$gallery = Gallery::find($id);
        $gallery->gallery_shades;
    	// dd($gallery);

    	return view('project_details',compact('gallery'));
    }
 
}
