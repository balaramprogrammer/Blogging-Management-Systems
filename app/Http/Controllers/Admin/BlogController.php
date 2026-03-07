<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function category_store(Request $request)
    {
      
                $request->validate([
                'name' => 'required',
                'image' => 'nullable|image'
                ]);

                $slug = Str::slug($request->name);
                if (Category::where('slug', $slug)->exists()) {
                    return back()->with('error', $slug.' category already exists.');
                }

            $imageName = null;

            if($request->hasFile('image')){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('category'), $imageName);
            }

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $imageName,
                'description' => $request->description,
                'status' => $request->status
            ]);

            return back()->with('success','Category Added Successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',

            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

            'tags' => 'nullable|string',

            'status' => 'required|in:draft,published,scheduled',

            'publish_date' => 'nullable|date'

        ]);


        // slug generate
        $slug = Str::slug($request->title);

        if(Post::where('slug',$slug)->exists()){
            $slug = $slug.'-'.time();
        }


        // image upload
        $imageName = null;

        if ($request->hasFile('featured_image')) {

            $imageName = time().'.'.$request->featured_image->extension();

            $request->featured_image->move(public_path('post_images'), $imageName);
        }


        // status logic
        // $status = $request->status == 'scheduled' ? 'draft' : $request->status;


        Post::create([

            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'featured_image' => $imageName,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

            'tags' => $request->tags,

            'status' => $request->status,

            'published_at' => $request->publish_date
        ]);

        return back()->with('success','Post Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function draft_blogs()
    {
        
        $posts = Post::with('category')->where('status','draft')->get();
        return view('admin.edit-blogs', compact('posts'));
    }

     function published_posts(){
        $posts = Post::with('category')->where('status','published')->get();
        return view('admin.published-posts', compact('posts'));
    }
     function scheduled_posts(){
        $posts = Post::with('category')->where('status','scheduled')->get();
        return view('admin.schedule-posts', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        dd('delete');
         $post = Post::findOrFail($id);

        // delete image if exists
        if ($post->featured_image && file_exists(public_path('post_images/'.$post->featured_image))) {
            unlink(public_path('post_images/'.$post->featured_image));
        }

        // delete post
        $post->delete();

        return back()->with('success','Post Deleted Successfully');
    }
}
