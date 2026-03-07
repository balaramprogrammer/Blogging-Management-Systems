<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Webcontroller extends Controller
{
   public function index(){
    return view('website.index');
   }

   public function about(){
    return view('website.about');
   }

   
   public function blog_reading($slug)
   {

      if(Auth::check() && Auth::user()->role =='admin')
      {
      $post = Post::with('category')
               ->where('slug',$slug)
               ->firstOrFail();
      }else{
         $post = Post::with('category')
            ->where('slug',$slug)
            ->where('status','published')
            ->firstOrFail();
      }
   
      
      $recentPosts = Post::latest()->take(5)->where('status','published')->get();
      $categories = Category::withCount('posts')->get();
      Post::where('slug',$slug)->increment('views',1);
      return view('website.blog-read',compact(
         'post',
         'recentPosts',
         'categories'
      ));

   }
}
