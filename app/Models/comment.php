<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
      protected $fillable = [
        'post_id','user_id','name','email',
        'comment','parent_id','status','ip_address'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Replies
    public function replies()
    {
        return $this->hasMany(comment::class, 'parent_id')
                    ->where('status','approved')
                    ->with('replies');
    }
     // Parent
    public function parent()
    {
        return $this->belongsTo(comment::class, 'parent_id');
    }
}
