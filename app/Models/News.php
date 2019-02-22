<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
    	'id',
		'title',
		'description',
		'editor_id',
		'editor_name',
		'view',
		'active',
		'edited_by_admin'
    ];
}
