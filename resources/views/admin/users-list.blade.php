@extends('admin.layouts.main')

@section('main')

<div class="container-fluid mt-4">

    <div class="card shadow border-0">

        <div class="card-header bg-light">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Scheduled Blog Post
            </h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="postTable" class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>Sr No.</th>
                            <th>Category</th>
                            <th>Post Title</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-center" style="min-width:140px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($posts as $i=>$post)

                        <tr>

                            <td>{{ $i+1 }}</td>

                            <td>
                                <div class="d-flex align-items-center gap-2">

                                    <img src="{{ asset('category/'.$post->category->image ?? '') }}"
                                         class="rounded shadow-sm"
                                         width="25"
                                         height="25"
                                         style="object-fit:cover">

                                    <span class="fw-semibold">
                                        {{ $post->category->name ?? 'No Category' }}
                                    </span>

                                </div>
                            </td>

                            <td class="fw-semibold">
                                {{ $post->title }}
                            </td>

                            <td>
                                <span class="badge bg-info">
                                    <i class="bi bi-eye"></i>
                                    {{ $post->views ?? 0 }}
                                </span>
                            </td>

                            <td>

                                <span class="badge 
                                {{ $post->status == 'published' ? 'bg-success' : 'bg-warning text-dark' }}">

                                    <i class="bi 
                                    {{ $post->status == 'published' ? 'bi-check-circle' : 'bi-clock' }}"></i>

                                    {{ ucfirst($post->status ?? 'draft') }}

                                </span>

                            </td>

                            <td>

                                <span class="text-muted small">
                                    <i class="bi bi-calendar-event"></i>
                                    {{ $post->created_at ? $post->created_at->format('d M Y h:i A') : '' }}
                                </span>

                            </td>

                            <td class="text-center text-nowrap">

                                <select class="form-select form-select-sm postAction"
                                        data-id="{{$post->id}}">

                                    <option value="">⚙ Action</option>
                                    <option value="view">👁 View</option>
                                    <option value="edit">✏ Edit</option>
                                    <option value="delete">🗑 Delete</option>

                                </select>

                            </td>

                        </tr>

                        <!-- DELETE FORM -->
                        <form id="deleteForm{{$post->id}}"
                        
                              action="{{ route('admin.blog.destroy',$post->id) }}"
                              method="POST"
                              >

                            @csrf
                            @method('DELETE')

                        </form>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script>

$(document).ready(function () {

    $('#postTable').DataTable({

        responsive:false,
        pageLength:5,
        lengthChange:false

    });

});


// Action Select
document.querySelectorAll('.postAction').forEach(function(select){

    select.addEventListener('change', function(){

        let action = this.value;
        let id = this.dataset.id;

        if(action === 'view'){
            window.location.href = "/admin/blog/"+id;
        }

        if(action === 'edit'){
            window.location.href = "/admin/blog/"+id+"/edit";
        }

        if(action === 'delete'){

            Swal.fire({
                title: "Delete Post?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Delete it!"
            }).then((result) => {

                if (result.isConfirmed) {
                    document.getElementById('deleteForm'+id).submit();
                }

            });

        }

        this.value = "";

    });

});
</script>

@endsection