<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    
    function dashboard(){
        $totalPosts = Post::count();
        $totalViews = Post::sum('views');
        return view('admin.dashboard', compact('totalPosts','totalViews'));
    }
   
    function bloggers_list(){
        $users = User::whereIn('role',['blogger','user'])->get();
        return view('admin.users-list', compact('users'));
    }
}
