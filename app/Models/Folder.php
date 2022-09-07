<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = ['nama_folder','parent_id'];
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function folderUser(){
        return $this->hasMany(folder_user::class);
    }
}