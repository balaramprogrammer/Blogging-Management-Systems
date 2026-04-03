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
         <i class="bi bi-journal-richtext"></i> Edit & Draft Posts
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
               <a href="{{ route('blog.read', $post->slug) }}">
               <img src="{{ asset('post_images/'.$post->featured_image) }}"
               class="card-img-top"
               style="height:200px;object-fit:cover"></a>
               <span class="badge bg-primary position-absolute top-0 start-0 m-2">
               <i class="bi bi-folder"></i>
               {{ $post->category->name ?? 'No Category' }}
               </span>
            </div>
            <div class="card-body">
               <h5 class="card-title ">
                  <a href="{{ route('blog.read',$post->slug) }}" class="text-decoration-underline">{{ $post->title }}</a>
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
        {{ $post->status == 'published' ? 'bg-warning' : 'bg-warning text-white' }}">
            <i class="bi 
            {{ $post->status == 'published' ? 'bi-check-circle' : 'bi-clock-history' }}"></i>
            {{ ucfirst($post->status ?? 'draft') }}
        </span>
    </span>

               

               {{--<p class="text-muted">
                  {!! Str::limit(strip_tags($post->content),100) !!}
               </p>--}}
            </div>
            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
               <span class="text-muted small">
               <i class="bi bi-eye"></i>
               {{ $post->views ?? 0 }} Views
               </span>
               <div class="btn-group">
                  <a href="{{ route('blog.read', $post->slug) }}" class="btn btn-sm btn-success">
                  <i class="bi bi-book"></i>
                  </a>
                  <a href="{{ route('admin.blog.edit', $post->id) }}"  class="btn btn-sm btn-warning">
                  <i class="bi bi-pencil"></i>
                  </a>
                  <button class="btn btn-sm btn-danger deletePost" data-id="{{ $post->id }}">
                     <i class="bi bi-trash"></i>
                  </button>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
<script>
document.querySelectorAll('.deletePost').forEach(button => {
    button.addEventListener('click', function() {

        let postId = this.dataset.id;

        Swal.fire({
            title: 'Are you sure?',
            text: "This post will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX DELETE request
                fetch("{{ url('/admin/blog') }}/" + postId, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json",
                    },
                })
                .then(res => res.json())
                .then(data => {
                    if(data.success){
                        Swal.fire(
                            'Deleted!',
                            'Your post has been deleted.',
                            'success'
                        ).then(() => location.reload());
                    } else {
                        Swal.fire('Error!', 'Something went wrong!', 'error');
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire('Error!', 'Something went wrong!', 'error');
                });
            }
        });
    });
});
</script>
@endsection