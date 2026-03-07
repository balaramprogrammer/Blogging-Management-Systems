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
    protected $casts = [
    'published_at' => 'datetime',
];
}
