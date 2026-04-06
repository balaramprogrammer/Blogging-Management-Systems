@extends('admin.layouts.main')
@section('main')
<style>

    .table.dataTable[class*=table-] thead th {
    background: #263544 !important;
    color:white !important;
}
</style>
<div class="container-fluid mt-4">
   <div class="card shadow border-0">
      <div class="card-header bg-light">
         <h4 class="mb-0">
            <i class="bi bi-folder"></i> Tags Management here!
         </h4>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table id="categoryTable" class="table table-bordered table-hover align-middle">
               <thead class="table-dark">
                  <tr>
                     <th>Sr No.</th>
                     <th>Tags</th>
                     <th>Slug</th>
                     <th>Use Posts</th>
                    
                     <th>Created At</th>
                     <th class="text-center" style="min-width:140px;">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($tags as $i => $tag)
                  <tr>
                     <td>{{ $i+1 }}</td>
                     <td>{{ $tag->name }}</td>
                     <td>{{ $tag->slug }}</td>
                     <td>{{ $tag->posts_count ?? 0 }}</td>
                    
                     <td>{{ $tag->created_at->format('d M, Y') }}</td>
                     <td class="text-center">
                        <!-- Update Category Button -->
                        {{-- 
                        <button  type="button"
                           class="btn btn-sm btn-warning editCategoryBtn"                         
                           data-bs-toggle="modal"
                           data-bs-target="#categoryModal">
                        <i class="bi bi-pencil" ></i>
                        </button>--}}
                        
                        <!-- Delete -->
                        <form id="deleteForm{{ $tag->id }}" action="{{ route('admin.tag.delete', $tag->id) }}" method="POST" style="display:inline;">
                           @csrf
                           @method('DELETE')
                           <button type="button" class="btn btn-sm btn-danger deleteTag" data-id="{{ $tag->id }}">
                           <i class="bi bi-trash"></i>
                           </button>
                        </form>
                     </td>
                  </tr>
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
      $('#categoryTable').DataTable({
         responsive: false,
         pageLength: 5,
         lengthChange: false
      });
   });
document.querySelectorAll('.deleteTag').forEach(function (button) {
   button.addEventListener('click', function () {
      let id = this.dataset.id;
      Swal.fire({
         title: "Delete Tag?",
         text: "This action cannot be undone!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#d33",
         cancelButtonColor: "#3085d6",
         confirmButtonText: "Yes, Delete it!"
      }).then((result) => {
         if (result.isConfirmed) {
            fetch("{{ url('/admin/tag_delete') }}/" + id, {
                  method: "DELETE",
                  headers: {
                     "X-CSRF-TOKEN": "{{ csrf_token() }}",
                     "Accept": "application/json",
                  }
               })
               .then(res => res.json())
               .then(data => {
                  if (data.success) {
                     Swal.fire('Deleted!', data.message, 'success')
                        .then(() => location.reload());
                  } else {
                     Swal.fire('Error!', data.message, 'error');
                  }
               })
               .catch(err => {
                  Swal.fire('Error!', 'Something went wrong!', 'error');
               });
         }
      });
   });
});
</script>
@endsection