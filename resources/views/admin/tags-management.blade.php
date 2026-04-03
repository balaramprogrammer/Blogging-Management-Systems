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
                     <th>Category Name</th>
                     <th>Slug</th>
                     <th>Posts</th>
                     <th>Status</th>
                     <th>Created At</th>
                     <th class="text-center" style="min-width:140px;">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($categories as $i => $cat)
                  <tr>
                     <td>{{ $i+1 }}</td>
                     <td>{{ $cat->name }}</td>
                     <td>{{ $cat->slug }}</td>
                     <td>{{ $cat->posts_count ?? 0 }}</td>
                     <td>
                        @if($cat->status == 'active')
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                     </td>
                     <td>{{ $cat->created_at->format('d M, Y') }}</td>
                     <td class="text-center">
                        <!-- Update Category Button -->
                        <button  type="button"
                           class="btn btn-sm btn-warning editCategoryBtn"                         
                           data-bs-toggle="modal"
                           data-bs-target="#categoryModal">
                        <i class="bi bi-pencil" ></i>
                        </button>
                        <!-- Delete -->
                        <form id="deleteForm{{ $cat->id }}" action="{{ route('admin.category.delete', $cat->id) }}" method="POST" style="display:inline;">
                           @csrf
                           @method('DELETE')
                           <button type="button" class="btn btn-sm btn-danger deleteCategory" data-id="{{ $cat->id }}">
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
<div class="modal fade" id="categoryModal" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">
               <i class="bi bi-folder-plus"></i> Add Category
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>

         <form action="{{route('admin.category.updated_store', $cat->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
              @method('PUT')

            <!-- Hidden ID -->
            <input type="hidden" name="id" id="category_id">

            <div class="modal-body">

               <!-- Name -->
               <div class="mb-3">
                  <label class="fw-bold">Category Name</label>
                  <input type="text"
                     name="name"
                     id="category_name"
                     class="form-control"
                     placeholder="Enter category name"
                     required>
               </div>

               <!-- Slug -->
               <div class="mb-3">
                  <label class="fw-bold">Slug</label>
                  <input type="text"
                     name="slug"
                     id="category_slug"
                     class="form-control"
                     readonly
                     placeholder="Generate slug">
               </div>

               <!-- Image -->
               <div class="mb-3">
                  <label class="fw-bold">Category Image</label>
                  <input type="file"
                     name="image"
                     class="form-control"
                     accept="image/*"
                     onchange="previewCategoryImage(event)">

                  <div class="mt-2">
                     <img id="categoryPreview"
                        src=""
                        style="max-width:120px; display:none; border-radius:6px;">
                  </div>
               </div>

               <!-- Description -->
               <div class="mb-3">
                  <label class="fw-bold">Description</label>
                  <textarea name="description"
                     id="category_description"
                     class="form-control"
                     rows="3"></textarea>
               </div>

               <!-- Status -->
               <div class="mb-3">
                  <label class="fw-bold">Status</label>
                  <select name="status" id="category_status" class="form-control">
                     <option value="active">Active</option>
                     <option value="inactive">Inactive</option>
                  </select>
               </div>

            </div>

            <div class="modal-footer">
               <button class="btn btn-primary">
                  <i class="bi bi-check-circle"></i> Save Category
               </button>
            </div>

         </form>
      </div>
   </div>
</div>
@endsection
@section('scripts')
<script>
   $(document).ready(function () {
      $('#categoryTable').DataTable({
         responsive: false,
         pageLength: 10,
         lengthChange: false
      });
   });
document.querySelectorAll('.deleteCategory').forEach(function (button) {
   button.addEventListener('click', function () {
      let id = this.dataset.id;
      Swal.fire({
         title: "Delete Category?",
         text: "This action cannot be undone!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#d33",
         cancelButtonColor: "#3085d6",
         confirmButtonText: "Yes, Delete it!"
      }).then((result) => {
         if (result.isConfirmed) {
            fetch("{{ url('/admin/category_delete') }}/" + id, {
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