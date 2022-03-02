<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;

    protected $table = 'user_lists';
    protected $fillable = [
        'title',
        'body',
        //カラム追加したので、以下も追加（3/1）
        'file_name',
        'file_path'
    ];
}
