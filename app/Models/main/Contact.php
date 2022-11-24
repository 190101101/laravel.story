<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $table = 'contact';
    
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
