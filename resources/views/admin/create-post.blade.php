@extends('admin.layouts.main')

@section('main')
<style>
.ck-editor__editable_inline {
    min-height: 300px;
}
</style>
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '{{ session('success') }}',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Category Already Exists',
    text: '{{ session('error') }}',
    confirmButtonColor: '#d33',
    confirmButtonText: 'OK'
});
</script>
@endif
<div class="container-fluid mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-light text-white">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Create Blog Post
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <!-- LEFT SIDE -->
                    <div class="col-md-8">

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Blog Title</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="Enter blog title" required>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Content</label>
                            <textarea name="content" id="editor" 
                                      class="form-control" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Tags</label>
                            <input type="text"
                                name="tags"
                                class="form-control"
                                placeholder="laravel, php, tutorial">
                        </div>
                        <!-- SEO -->
                        <div class="card mt-4">
                            <div class="card-header bg-light fw-bold">
                                <i class="bi bi-graph-up"></i> SEO Settings
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                <label>Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control">
                                </div>

                            </div>
                        </div>

                    </div>


                    <!-- RIGHT SIDE -->
                    <div class="col-md-4">

                        <!-- Publish Settings -->
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-upload"></i> Publish Settings
                            </div>

                           
                        </div>


                        <!-- Category -->
                        <div class="card mb-3">
                            <div class="card-header bg-light fw-bold">
                                <i class="bi bi-folder"></i> Category
                            </div>

                            <div class="card-body">

                                <div class="input-group mb-2">

                                    <select name="category_id"
                                            class="form-select"
                                            id="categorySelect">

                                        <option value="">Select Category</option>

                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    <!-- Add Category Button -->
                                    <button type="button"
                                            class="btn btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#categoryModal">
                                        <i class="bi bi-plus-lg"></i>
                                    </button>

                                </div>

                            </div>
                        </div>


                        <!-- Featured Image -->
                        <div class="card">
                            <div class="card-header bg-light fw-bold">
                                <i class="bi bi-image"></i> Featured Image
                            </div>

                            <div class="card-body">

                                <input type="file"
                                    name="featured_image"
                                    class="form-control"
                                    accept="image/*"
                                    onchange="previewImage(event)">

                                <div class="mt-3">
                                    <img id="imagePreview"
                                        src=""
                                        style="max-width:200px; display:none; border-radius:8px;">
                                </div>

                            </div>

                             <div class="card-body">

                                <label>Status</label>
                                <select name="status" class="form-select mb-3" id="status">
                                    <option value="draft">Draft</option>
                                    <option value="published">Publish Now</option>
                                    <option value="scheduled">Schedule</option>
                                </select>

                                <div id="scheduleBox" style="display:none;">
                                    <label>Schedule Date & Time</label>
                                    <input type="datetime-local"
                                           name="publish_date"
                                           class="form-control">
                                </div>

                                <button class="btn btn-success w-100 mt-3">
                                    <i class="bi bi-save"></i> Save Blog
                                </button>

                            </div>
                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>

</div>


<!-- ================= CATEGORY MODAL ================= -->

<div class="modal fade" id="categoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-folder-plus"></i> Add Category
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="fw-bold">Category Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter category name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Slug</label>
                        <input type="text"
                               name="slug"
                               class="form-control"
                               readonly
                               placeholder="Generate slug">
                    </div>

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

                    <div class="mb-3">
                        <label class="fw-bold">Description</label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Status</label>
                        <select name="status" class="form-control">
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




{{-- ================= SCRIPTS ================= --}}
@section('scripts')

<!-- CKEditor 5 Full Build -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<script>

window.onload = function () {

    if (typeof ClassicEditor !== "undefined") {

        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading','|',
                    'bold','italic','underline','strikethrough',
                    'link','blockQuote','codeBlock','|',
                    'bulletedList','numberedList','todoList','|',
                    'outdent','indent','alignment','|',
                    'insertTable','imageUpload','mediaEmbed','|',
                    'undo','redo'
                ],

                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },

                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side'
                    ]
                }

            })
            .catch(error => {
                console.error(error);
            });

    } else {
        console.error("CKEditor not loaded");
    }

    // Schedule Toggle
    const status = document.getElementById('status');
    const scheduleBox = document.getElementById('scheduleBox');

    if(status){
        status.addEventListener('change', function () {
            scheduleBox.style.display =
                this.value === 'scheduled' ? 'block' : 'none';
        });
    }

};
document.querySelector('[name="name"]').addEventListener('keyup', function() {
    let slug = this.value
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'');

    document.querySelector('[name="slug"]').value = slug;
});
</script>
<script>
function previewImage(event) {

    let reader = new FileReader();

    reader.onload = function(){
        let output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    };

    reader.readAsDataURL(event.target.files[0]);
}
function previewCategoryImage(event){

    let reader = new FileReader();

    reader.onload = function(){
        let output = document.getElementById('categoryPreview');
        output.src = reader.result;
        output.style.display = "block";
    };

    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection

@endsection