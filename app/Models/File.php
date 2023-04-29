<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre_fr',
        'titre',
        'blog_post_id',
        'date',
        'file_path'
        
        
    ];
}
