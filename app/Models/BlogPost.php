<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DB;
class BlogPost extends Model
{
    use HasFactory;

    //protected $table = "blog";
    //protected $primaryKey = "blog_id";
    //$timestamp = false

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'title_fr',
        'body_fr',
        'file_id'
        
    ];

    public function blogHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function blogHasCategory(){
        return $this->hasOne('App\Models\Category', 'id', 'categories_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
    public function selectBlog($order = 'ASC') {
        $lang = null;
        if(session()->has('locale') && session()->get('locale') == 'fr'):
        $lang = '_fr';
        endif;
       
        return $this::select('id',
        DB::raw("(case when name$lang is null then name else name$lang
        end) as name")
        )
        ->orderBy('name', $order)
        ->get();
        }
       
}
