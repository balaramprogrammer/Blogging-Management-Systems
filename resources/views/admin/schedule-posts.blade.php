@extends('admin.layouts.main')
@section('main')
<style>
   .blog-card{
   transition:0.3s;
   }
   .blog-card:hover{
   transform:translateY(-5px);
   box-shadow:0 10px 25px rgba(0,0,0,0.15);
   }
</style>
<div class="container-fluid mt-4">
   <div class="d-flex justify-content-between align-items-center mb-4">
      <h4>
         <i class="bi bi-journal-richtext"></i> Scheduled Posts
      </h4>
      <a href="{{route('admin.blog.create')}}" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Add New Post
      </a>
   </div>
   <div class="row">
      @foreach($posts as $i=>$post)
      <div class="col-lg-4 col-md-6 mb-4">
         <div class="card shadow-sm border-0 blog-card">
            <!-- Post Image -->
            <div class="position-relative">
               {{-- <img src="https://picsum.photos/500/300?random={{$i}}" --}}
               <a href="{{ route('blog.read',$post->slug) }}">
               <img src="{{ asset('post_images/'.$post->featured_image) }}"
                  class="card-img-top"
                  style="height:200px;object-fit:cover"></a>
               <span class="badge bg-primary position-absolute top-0 start-0 m-2">
               <i class="bi bi-folder"></i>
               {{ $post->category->name ?? 'No Category' }}
               </span>
            </div>
            <div class="card-body">

            <h5 class="card-title">
                <a href="{{ route('blog.read',$post->slug) }}" class="text-decoration-underline">
                    {{ $post->title }}
                </a>
            </h5>

            <p class="text-muted small d-flex align-items-center gap-3">

                <span>
                    <i class="bi bi-calendar-event"></i>
                    {{ $post->created_at ? $post->created_at->format('d M Y h:i A') : '' }}
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    {{ $post->created_at ? $post->created_at->diffForHumans() : '' }}
                </span>

            </p>

            <span>
                <span class="badge 
                {{ $post->status == 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                <i class="bi 
                {{ $post->status == 'published' ? 'bi-check-circle' : 'bi-clock-history' }}"></i>

                {{ ucfirst($post->status ?? 'draft') }}
                </span>
            </span>

           

            <p class="text-muted">
                {!! Str::limit(strip_tags($post->content),100) !!}
            </p>
     {{-- Scheduled Timer --}}
            @if($post->status == 'scheduled' && $post->published_at)
                <p class="text-danger">
                    <i class="bi bi-hourglass-split"></i>
                    Publishing in:
                    <span class="countdown" data-date="{{ $post->published_at }}"></span>
                </p>
            @endif
            </div>
            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
               <span class="text-muted small">
               <i class="bi bi-eye"></i>
               {{ $post->views ?? 0 }} Views
               </span>
               <div class="btn-group">
                  <a href="{{ route('blog.read',[$post->category->slug, $post->slug]) }}" class="btn btn-sm btn-success">
                  <i class="bi bi-book"></i>
                  </a>
                  <a href="/admin/blog/{{$post->id}}/edit" class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil"></i>
                  </a>
                  <button class="btn btn-sm btn-danger deletePost"
                     data-id="{{$post->id}}">
                  <i class="bi bi-trash"></i>
                  </button>
                  
               </div>
               
            </div>
         </div>
         
      </div>
      @endforeach
   </div>
</div>
@section('scripts')
<script>
document.querySelectorAll('.countdown').forEach(function(el){

    let publishDate = new Date(el.dataset.date).getTime();

    let timer = setInterval(function(){

        let now = new Date().getTime();
        let distance = publishDate - now;

        if(distance < 0){
            el.innerHTML = "Published";
            clearInterval(timer);
            return;
        }

        let days = Math.floor(distance / (1000*60*60*24));
        let hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
        let minutes = Math.floor((distance % (1000*60*60)) / (1000*60));
        let seconds = Math.floor((distance % (1000*60)) / 1000);

        el.innerHTML = days+"d "+hours+"h "+minutes+"m "+seconds+"s ";

    },1000);

});
</script>
@endsection
@endsection