<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['nama_folder','parent_id'];
    // public function childs() {
    //     return $this->hasMany('App\Category','parent_id','id') ;
    // }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }

}
