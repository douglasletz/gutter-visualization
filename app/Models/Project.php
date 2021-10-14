<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    
    
  public function gallery(){

    return $this->belongsTo('App\Models\Gallery');
  }
    public function gallery_shades(){
    
      return $this->hasMany('App\Models\GalleryShades', 'gallery_id', 'gallery_id');
    }
}