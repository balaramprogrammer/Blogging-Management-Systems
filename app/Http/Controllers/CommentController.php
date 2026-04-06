<?php

namespace App\Http\Controllers;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|min:3|max:1000'
        ]);

        $comment = comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
            'ip_address' => $request->ip(),
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Comment submitted, waiting for approval'
        ]);
    }


    public function fetch($post_id)
    {
        $comments = comment::where('post_id',$post_id)
            ->whereNull('parent_id')
            ->where('status','approved')
            ->with('replies')
            ->latest()
            ->get();

        return view('partials.comments', compact('comments'));
    }
    public function comments()
    {  
        return view('admin.admin-comment');
    }
}
