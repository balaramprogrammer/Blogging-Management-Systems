@extends('website.layouts.main')
@section('title') Blog Details @endsection
@section('content')
<style>
   .blog-wrapper{
   max-width:1200px;
   margin:auto;
   }
   /* blog title */
   .blog-title{
   font-size:34px;
   font-weight:700;
   margin-bottom:10px;
   }
   /* blog meta */
   .blog-meta{
   font-size:14px;
   color:#777;
   }
   /* blog image */
   .blog-image{
   width:100%;
   border-radius:8px;
   margin:20px 0;
   }
   /* blog content */
   .blog-content{
   font-size:17px;
   line-height:1.8;
   color:#333;
   }
   /* sidebar */
   .sidebar-card{
   border:none;
   box-shadow:0 3px 15px rgba(0,0,0,0.08);
   margin-bottom:25px;
   }
   .sidebar-post{
   display:flex;
   gap:10px;
   margin-bottom:15px;
   }
   .sidebar-post img{
   width:70px;
   height:55px;
   object-fit:cover;
   border-radius:5px;
   }
   .sidebar-post-title{
   font-size:14px;
   font-weight:600;
   }
   /* category badge */
   .category-badge{
   background:#0d6efd;
   color:white;
   padding:5px 12px;
   border-radius:20px;
   font-size:12px;
   }
   /* author box */
   .author-box{
   background:#f8f9fa;
   padding:20px;
   border-radius:8px;
   }
   .share-icons i{
   font-size:18px;
   margin-right:10px;
   cursor:pointer;
   }
</style>
<div class="container mt-5 blog-wrapper">
   <div class="row">

      <!-- BLOG CONTENT -->
      <div class="col-lg-8">

         <span class="category-badge">
            {{ $post->category->name ?? 'No Category' }}
         </span>

         <h1 class="blog-title">
            {{ $post->title }}
         </h1>

         <div class="blog-meta">
            <i class="bi bi-person"></i> Admin

            &nbsp;&nbsp;

            <i class="bi bi-calendar"></i>
            {{ $post->published_at ? $post->published_at->format('d M Y') : '' }}

            &nbsp;&nbsp;

            <i class="bi bi-eye"></i>
            {{ $post->views ?? 0 }} Views
         </div>

         <img src="{{ asset('post_images/'.$post->featured_image) }}"
              class="blog-image">

         <div class="blog-content mt-4">

            {!! $post->content !!}

         </div>

         <hr>

         <!-- SHARE -->
         <div class="mt-4">
            <b>Share</b>

            <div class="share-icons mt-2">

               <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                  target="_blank">
                  <i class="bi bi-facebook"></i>
               </a>

               <a href="https://twitter.com/share?url={{ url()->current() }}"
                  target="_blank">
                  <i class="bi bi-twitter"></i>
               </a>

               <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}"
                  target="_blank">
                  <i class="bi bi-linkedin"></i>
               </a>

               <a href="https://wa.me/?text={{ url()->current() }}"
                  target="_blank">
                  <i class="bi bi-whatsapp"></i>
               </a>

            </div>
         </div>

         <hr>

         <!-- AUTHOR BOX -->
         <div class="author-box mt-4">
            <div class="d-flex align-items-center">

               <img src="https://i.pravatar.cc/80"
                    class="rounded-circle me-3">

               <div>
                  <h6 class="mb-0">Admin</h6>
                  <small class="text-muted">
                     Laravel Developer & Blogger
                  </small>
               </div>

            </div>
         </div>

      </div>


      <!-- SIDEBAR -->
      <div class="col-lg-4">

         <!-- SEARCH -->
         <div class="card sidebar-card">
            <div class="card-body">

               <input type="text"
                      class="form-control"
                      placeholder="Search blog...">

            </div>
         </div>


         <!-- RECENT POSTS -->
         <div class="card sidebar-card mt-3">

            <div class="card-header">
               Recent Posts
            </div>

            <div class="card-body">

               @foreach($recentPosts as $recent)

               <div class="sidebar-post">

                  <img src="{{ asset('post_images/'.$recent->featured_image) }}">

                  <div>

                     <a href="{{ route('blog.read',$recent->slug) }}"
                        class="sidebar-post-title">

                        {{ $recent->title }}

                     </a>

                     <br>

                     <small class="text-muted">
                        {{ $recent->created_at->format('d M Y') }}
                     </small>

                  </div>

               </div>

               @endforeach

            </div>

         </div>


         <!-- CATEGORIES -->
         <div class="card sidebar-card mt-3">

            <div class="card-header">
               Categories
            </div>

            <div class="card-body">

               <ul class="list-unstyled">

                  @foreach($categories as $category)

                  <li class="mb-2">

                     <a href="#">
                        {{ $category->name }}
                     </a>

                     ({{ $category->posts_count }})

                  </li>

                  @endforeach

               </ul>

            </div>

         </div>

      </div>

   </div>
</div>
@endsection