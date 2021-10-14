<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
 public function gallery_shades(){

 	return $this->hasMany('App\Models\GalleryShades');
 }
}


