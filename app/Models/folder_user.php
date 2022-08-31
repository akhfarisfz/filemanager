<?php

namespace App\Models;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class folder_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'folders_id',
        'users_id',
        'isAllowed',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function folderuser(){
        return $this->belongsTo(Folder::class);
    }
}
