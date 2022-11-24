<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\main\User;
use App\Models\main\Category;

class Article extends Model
{
    use HasFactory;
    
    protected $table = 'article';

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'content',
        'category_id',
        'user_id',
        'status',
        'type',
    ];


    public function getUser()
    {
        return $this->hasOne('App\Models\main\User', 'id', 'user_id');
    }

    public function getCategory()
    {
        return $this->hasOne('App\Models\main\Category', 'id', 'category_id');
    }
}
