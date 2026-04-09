<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

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
public function category_updated_store(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'image' => 'nullable|image'
    ]);

    $category = Category::findOrFail($id);

    $slug = Str::slug($request->name);

    if (Category::where('slug', $slug)->where('id', '!=', $id)->exists()) {
        return back()->with('error', $slug.' category already exists.');
    }

    $imageName = $category->image;

    if($request->hasFile('image')){

        // old image delete
        if($category->image && file_exists(public_path('category/'.$category->image))){
            unlink(public_path('category/'.$category->image));
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('category'), $imageName);
    }

    $category->update([
        'name' => $request->name,
        'slug' => $slug,
        'image' => $imageName,
        'description' => $request->description,
        'status' => $request->status
    ]);

    return back()->with('success','Category Updated Successfully');
}
    public function category_list()
    {
       $categories =  Category::withCount('Posts')->get();
      
        return view ('admin.management-category', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::all();
        return view('admin.create-post', compact('categories'));
    }
    public function category_edit()
    {
        
        $categories = Category::all();
        return view('admin.create-post', compact('categories'));
    }
    public function category_delete($category_id)
    {
       
        $category = Category::withCount('posts')->findOrFail($category_id);

        if ($category->posts_count > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category. There are posts associated with it.'
            ]);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.'
        ]);
    }
    public function tag_delete($tag_id)
    {
       
        $tag_id = tag::withCount('posts')->findOrFail($tag_id);

        if ($tag_id->posts_count > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot Tag Delete. There are posts associated with it.'
            ]);
        }

        $tag_id->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tag deleted successfully.'
        ]);
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
        'featured_image' => 'nullable|mimetypes:image/avif,image/jpeg,image/png,image/webp|max:2048',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'tags' => 'nullable|string', // comma separated
        'status' => 'required|in:draft,published,scheduled',
        'publish_date' => 'nullable|date'
    ]);

    // slug generate
    $slug = Str::slug($request->title);
    if (Post::where('slug', $slug)->exists()) {
        $slug = $slug . '-' . time();
    }

    // image upload
    $imageName = null;
    if ($request->hasFile('featured_image')) {
        $imageName = time() . '.' . $request->featured_image->extension();
        $request->featured_image->move(public_path('post_images'), $imageName);
    }

    // create post
    $post = Post::create([
        'title' => $request->title,
        'slug' => $slug,
        'category_id' => $request->category_id,
        'content' => $request->content,
        'featured_image' => $imageName,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'blogger_id' => 1,
        'status' => $request->status,
        'published_at' => $request->publish_date
    ]);

    // tags save
    if ($request->filled('tags')) {
        $tagIds = [];

        foreach (explode(',', $request->tags) as $tagName) {
            $tagName = trim($tagName);

            if ($tagName) {
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
        }

        $post->tags()->sync($tagIds);
    }

    return back()->with('success', 'Post Added Successfully');
}


    public function store_updated_post(Request $request, $id)
{
    $post = Post::findOrFail($id);

    // Slug update
    if ($post->title !== $request->title) {
        $slug = Str::slug($request->title);
        if (Post::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug .= '-' . time();
        }
        $post->slug = $slug;
    }

    // Image update
    if ($request->hasFile('featured_image')) {
        if ($post->featured_image && file_exists(public_path('post_images/' . $post->featured_image))) {
            unlink(public_path('post_images/' . $post->featured_image));
        }

        $imageName = time().'.'.$request->featured_image->extension();
        $request->featured_image->move(public_path('post_images'), $imageName);
        $post->featured_image = $imageName;
    }

    // Update
    $post->update([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'content' => $request->content,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'status' => $request->status,
        'published_at' => $request->publish_date,
    ]);

    // Tags
  
    if ($request->has('tags')) {
        $tagIds = [];
        foreach (explode(',',$request->tags) as $tagName) {
            $tag = Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            );
            $tagIds[] = $tag->id;
        }
        $post->tags()->sync($tagIds);
    } else {
        $post->tags()->detach();
    }

    return back()->with('success', 'Post Updated Successfully');
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
        
       $posts = Post::with('category')
            ->where('status', 'draft')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->get();

        return view('admin.draft-blogs', compact('posts'));
    }

     function published_posts(){
        $posts = Post::with('category')->where('status','published')
                ->whereHas('category', function ($query) {
                    $query->where('status','active');
                })
                ->get();
        
        return view('admin.published-posts', compact('posts'));
    }
     function scheduled_posts(){
        $posts = Post::with('category')->where('status','scheduled') ->whereHas('category', function ($query) {
                    $query->where('status','active');
                })
                ->get();
        return view('admin.schedule-posts', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function edit($id)
{
    // Post ke saath category aur tags load karo
    $post = Post::with('tags')->findOrFail($id);
   

    // Active categories for dropdown
    $categories = Category::where('status', 'active')->get();

    return view('admin.edit-post', compact('post','categories'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        
         $post = Post::findOrFail($id);

        // delete image if exists
        if ($post->featured_image && file_exists(public_path('post_images/'.$post->featured_image))) {
            unlink(public_path('post_images/'.$post->featured_image));
        }

        // delete post
        $post->delete();

        // return JSON for AJAX
    return response()->json([
        'success' => true,
        'message' => 'Post Deleted Successfully'
    ]);
    }

    public function tags_managements(){
        $tags =  tag::withCount('Posts')->get();
        return view('admin.tags-management', compact('tags'));
    }
}
