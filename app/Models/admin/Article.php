<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Category;

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
        'status'
    ];

    public function getCategory()
    {
        return $this->hasOne('App\Models\admin\Category', 'id', 'category_id');
    }
}
