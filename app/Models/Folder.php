<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Folder;

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
