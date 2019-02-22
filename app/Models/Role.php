<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'name', 'slug', 'permissions'
    ];

    /**
     * Dropdown list for role.
     *
     * @return array
     */
    public static function dropdown()
    {
        return static::orderBy('name')->whereNotIn('slug', ['super-admin'])->lists('name', 'id');
    }

    /**
     * Role User Belong To Many User Table
     */    
    public function UserRoles()
    {
        return $this->belongsToMany('App\Models\User', 'role_users', 'role_id');
    }
}
