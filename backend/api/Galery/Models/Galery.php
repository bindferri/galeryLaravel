<?php

namespace Api\Galery\Models;

use Infrastructure\Abstracts\Model;

class Galery extends Model {

    protected $table = 'galery';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'description', 'users_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
