<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    public function getCount()
    {
        return $this->hasMany('App\Models\main\Article', 'category_id', 'id')->count();
    }
}
