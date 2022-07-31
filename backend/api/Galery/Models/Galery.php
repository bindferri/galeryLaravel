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

    protected $appends = ['fullUrl'];

    protected function getfullUrlAttribute (){
        return storage_path('app\public\galery_assets') . '\\' . $this->image;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
