<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    public $fillable = ['title','parent_id'];
    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function file(){
        return $this->hasMany(File::class);
    }
}
