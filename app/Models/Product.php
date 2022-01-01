<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->hasOne('App\Models\Media');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Media');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
