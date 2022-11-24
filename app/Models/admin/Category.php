<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'content',
        'image',
        'status',
        'delete',
    ];
}
