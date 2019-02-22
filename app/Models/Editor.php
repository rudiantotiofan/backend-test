<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $table = 'editor';

    protected $fillable = ['id', 'name', 'about', 'user_id'];
}
