<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'title',
    'slug',
    'category_id',
    'content', 
    'featured_image',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'tags',
    'status',
    'published_at'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function tags(){
        return $this->belongstoMany(tag::class);
    }

    public function comments(){
        return $this->hasMany(comment::class) ->whereNull('parent_id')
                ->where('status','approved')
                ->with('replies');
    }
    

    protected $casts = [
    'published_at' => 'datetime',
];
}
